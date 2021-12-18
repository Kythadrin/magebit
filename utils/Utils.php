<?php

class Utils {
    public function drawPagination($totalItems, $perPage)
    {
        $pagesCount = ceil($totalItems / $perPage);
        $currentPage = $_GET['page'];

        if ($currentPage == '' || $currentPage <= 1) $currentPage = 1;
        elseif ($currentPage >= $pagesCount) $currentPage = $pagesCount;

        if ($pagesCount == 0) $pagesCount = 1;

        $pagination = '<div class="page-info"> Page ' . $currentPage . ' of ' . $pagesCount . '</div>';

        if ($pagesCount > 1) {
            $pagination .= '<ul>';
            $next_page = $currentPage + 1;
            $prev_page = $currentPage - 1;

            $pagination .= '<li><a href="?page=' . $prev_page . '">Previous</a></li>';

            function pageButtons($startPage, $endPage, $currentPage) 
            {
                $pagination = '';
    
                for ($i = $startPage; $i <= $endPage; $i++) {
                    if ($i == $currentPage) 
                        $pagination .= '<li class="active-page"><a href="?page=' . $currentPage . '">' . $currentPage . '</a></li>';
                    else 
                        $pagination .= '<li><a href="?page=' . $i . '">' . $i . '</a></li>';
                }
    
                return $pagination;
            }

            if ($pagesCount <= 12) {
                $pagination .= pageButtons(1, $pagesCount, $currentPage);
            } elseif ($currentPage <= 5) {
                $pagination .= pageButtons(1, $currentPage + 2, $currentPage);
                $pagination .= '<li>...</li>';
            } elseif ($currentPage > $pagesCount - 5) {
                $pagination .= pageButtons(1, 3, $currentPage);
                $pagination .= '<li>...</li>';
            } else {
                $pagination .= pageButtons(1, 3, $currentPage);
                $pagination .= '<li>...</li>';
                $pagination .= pageButtons($currentPage - 2, $currentPage + 2, $currentPage);
                $pagination .= '<li>...</li>';
                $pagination .= pageButtons($pagesCount - 2, $pagesCount, $currentPage);
            }

            $pagination .= '<li><a href="?page=' . $next_page . '">Next</a></li>';
        }

        return $pagination;
    }
}