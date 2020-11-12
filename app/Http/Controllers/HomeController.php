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

    public function index($date = false)
    {
        if (! $date) {
            $date = date('Y-m-d');
        }

        $parsedown = new Parsedown();
        $parsedown->setBreaksEnabled(true);

        $readings = Reading::where('publish_date', $date)->get();

        $prayer   = Prayer::where('day', date('l', strtotime($date)))->firstOr(function () {
            $prayer         = new stdClass();
            $prayer->prayer = '';

            return $prayer;
        });
        $sections = Section::all();

        $indexedSections = [];
        foreach ($sections as $section) {
            $indexedSections[$section->section] = $parsedown->text(trim($section->content));
        }

        $indexedReadings = [];
        foreach ($readings as $reading) {
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
                $url               = false;
            }
            $indexedReadings[] = [
                'url'          => $url,
                'readingTitle' => $reading->passage,
                'readingText'  => $parsedown->text($this->readingText),
            ];
        }

        return view('welcome', [
            'date'     => $date,
            'prayer'   => $parsedown->text($prayer->prayer),
            'sections' => $indexedSections,
            'readings' => $indexedReadings,
        ]);
    }
}
