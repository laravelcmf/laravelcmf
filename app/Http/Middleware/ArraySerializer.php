<?php
/**
 * Created by PhpStorm.
 * User: JeffreyBool
 * Date: 2020/3/22
 * Time: 00:35
 */

namespace App\Http\Middleware;

use League\Fractal\Pagination\PaginatorInterface;
use League\Fractal\Serializer\ArraySerializer as BaseSerializer;

class ArraySerializer extends BaseSerializer
{
    /**
     * Serialize null resource.
     * @return array
     */
    public function null()
    {
        return null;
    }

    /**
     * Serialize the paginator.
     * @param PaginatorInterface $paginator
     * @return array
     */
    public function paginator(PaginatorInterface $paginator)
    {
        $currentPage = $paginator->getCurrentPage();
        $lastPage = $paginator->getLastPage();

        $pagination = [
            'total'        => (int)$paginator->getTotal(),
            'count'        => (int)$paginator->getCount(),
            'per_page'     => (int)$paginator->getPerPage(),
            'current_page' => $currentPage,
            'total_pages'  => $lastPage,
        ];

        $pagination['links']['previous'] = null;
        $pagination['links']['next'] = null;

        if($currentPage > 1) {
            $pagination['links']['previous'] = $paginator->getUrl($currentPage - 1);
        }

        if($currentPage < $lastPage) {
            $pagination['links']['next'] = $paginator->getUrl($currentPage + 1);
        }

        if(!array_filter($pagination['links'])) {
            $pagination['links'] = null;
        }

        return ['pagination' => $pagination];
    }
}
