<?php

namespace App\Http\Controllers;

use App\Models\Prayer;
use App\Models\Reading;
use App\Models\Section;
use Exception;
use Goutte\Client;
use Parsedown;
use stdClass;

class HomeController extends Controller
{
    private string $readingText;

    public function index()
    {
        $parsedown = new Parsedown();

        $parsedown->setBreaksEnabled(true);

        $reading  = Reading::where('publish_date', date('Y-m-d'))->firstOr(function () {
            $reading = new stdClass();
            $reading->passage = '';

            return $reading;
        });
        $prayer   = Prayer::where('day', date('l'))->firstOr(function () {
            $prayer = new stdClass();
            $prayer->prayer = '';

            return $prayer;
        });
        $sections = Section::all();

        $indexedSections = [];
        foreach ($sections as $section) {
            $indexedSections[$section->section] = $parsedown->text(trim($section->content));
        }

        try {
            $client = new Client();

            $this->readingText = '';

            $url = 'http://bible.oremus.org/?vnum=no&passage=' . $reading->passage;

            $crawler = $client->request('GET', $url);

            if ($crawler !== null) {
                $crawler->filter('.bibletext')->each(function ($node) {
                    // $this->readingText .= $node->html();
                    $this->readingText .= strip_tags($node->html(), '<span><h2><br><p><div><sup>');
                });
            }
        } catch (Exception $exception) {
            $this->readingText = $reading->passage ?: '';
            $url = false;
        }

        return view('welcome', [
            'date'         => session('date', date('Y-m-d')),
            'url'          => $url,
            'readingTitle' => $reading->passage,
            'readingText'  => $parsedown->text($this->readingText),
            'prayer'       => $parsedown->text($prayer->prayer),
            'sections'     => $indexedSections,
        ]);
    }
}
