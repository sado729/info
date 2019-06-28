<?php
/**
 * Created by PhpStorm.
 * User: TexnoBaku
 * Date: 1/20/2019
 * Time: 12:08 AM
 */


use App\Extensions\Date;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Models\Information;

if (! function_exists('social_links')) {
    function social_links(){
        $return = '';
        $information = Information::first();
        if(!empty($information->twitter)){
            $return = '<li>
                    <a href="'.$information->twitter.'" title="Twitter '.config('app.name').'" target="_blank">
                        <img src="/app/img/twitter-1.png" alt="twitter '.config('app.name').' icon">
                    </a>
                </li>';
        }
        if(!empty($information->facebook)){
            $return = '<li>
                    <a href="'.$information->facebook.'" title="Facebook '.config('app.name').'" target="_blank">
                        <img src="/app/img/facebook-1.png" alt="facebook '.config('app.name').' icon">
                    </a>
                </li>';
        }
        if(!empty($information->instagram)){
            $return = '<li>
                    <a href="'.$information->instagram.'" title="Instagram '.config('app.name').'" target="_blank">
                        <img src="/app/img/instagram-1.png" alt="instagram '.config('app.name').' icon">
                    </a>
                </li>';
        }
        if(!empty($information->linkedin)){
            $return = '<li>
                    <a href="'.$information->linkedin.'" title="Linkedin '.config('app.name').'" target="_blank">
                        <img src="/app/img/linkedin-1.png" alt="linkedin '.config('app.name').' icon">
                    </a>
                </li>';
        }
        if(!empty($information->youtube)){
            $return = '<li>
                    <a href="'.$information->youtube.'" title="Youtube '.config('app.name').'" target="_blank">
                        <img src="/app/img/youtube-1.png" alt="youtube '.config('app.name').' icon">
                    </a>
                </li>';
        }

        return $return;
    }
}

if (! function_exists('on_page')) {
    /**
     * Display how many items are on the page.
     *
     * @param \Illuminate\Pagination\LengthAwarePaginator $items
     *
     * @return string
     */
    function on_page(LengthAwarePaginator $items) {
        $start = $items->perPage() * ($items->currentPage() - 1) + 1 ?: 0;

        return $start.'-'.($start ? $start + $items->count() - 1 : 0);
    }
}


if (! function_exists('links')) {
    /**
     * Display the paginator links.
     *
     * @param \Illuminate\Pagination\LengthAwarePaginator $items
     * @param \Illuminate\Http\Request                    $request
     *
     * @return string
     */
    function links(LengthAwarePaginator $items, Request $request) {
        return $items->appends($request->only(['perPage', 'lang']))->links('app.pagination');
    }
}

if (! function_exists('links_range')) {
    /**
     * Get the pagination links range.
     *
     * @param \Illuminate\Pagination\LengthAwarePaginator $paginator
     *
     * @return array
     */
    function links_range(LengthAwarePaginator $paginator) {
        $currentPage = $paginator->currentPage();
        $lastPage    = $paginator->lastPage();

        $start = $currentPage - 2;
        $end   = $currentPage + 2;

        if ($lastPage == $currentPage) {
            $start -= 2;
        } elseif ($lastPage == $currentPage + 1) {
            $start -= 1;
        }

        if ($start < 1) {
            $start = 1;
        }

        if ($currentPage < 2) {
            $end += 2;
        } elseif ($currentPage < 3) {
            $end += 1;
        }

        if ($end >= $lastPage) {
            $end = $lastPage;
        }

        return compact('start', 'end');
    }
}

if (! function_exists('timeago')) {
    /**
     * Get the difference in a human readable format in the current locale.
     *
     * @param \App\Extensions\Date $time
     *
     * @return \Illuminate\Contracts\Translation\Translator|string
     */
    function timeago(Date $time)
    {
        if (($diff = time() - ($time = $time->timestamp)) <= 19) {
            return __('datetime.just_now');
        } //vse birdeneproductda qurda bunu gorum nece iwledecem

        if ($diff > 19 && $diff <= 59) {
            return __('datetime.few_seconds_ago');
        }

        $int = [
            $diff < 604800 => ['day', 86400],
            $diff < 86400  => ['hour', 3600],
            $diff < 3600   => ['minute', 60]
        ];

        if (isset($int[1])) {
            $value = floor($diff / $int[1][1]);
            $age   = $int[1][0];

            if ($value < 2 && $age == 'day') {
                return __('datetime.yesterday_at').' '.date('H:i', $time);
            }

            if ($value > 1 && $value < 8 && $age == 'day') {
                return __('datetime.'.date('l', $time)).' '.date('H:i', $time);
            }

            if ($value <= 59 && $age != 'day') {
                return $value.' '.trans_choice('datetime.'.$age, $value).' '.__('datetime.ago');
            }
        }

        return date('j', $time).' '.__('datetime.'.date('M', $time)).' '.date('Y H:i', $time);
    }
}
