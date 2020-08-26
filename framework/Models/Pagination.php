<?php

namespace Framework\Models;
use Application\Components\Query;
use Application\Exceptions\Logger;
use Application\Core\Controller;


class Pagination {

	public $currentPage, $itemsPerPage, $totalCount;

	public function __construct($currentPage = 1, $totalCount = 0, $itemsPerPage = 0) {
		$this->currentPage = empty($currentPage) ? 1 : (int)$currentPage;
		$this->totalCount = empty($totalCount) ? 0 : (int)$totalCount;
        $this->itemsPerPage = empty($itemsPerPage) ? PAGINATION_DEFAULT_LIMIT : (int)$itemsPerPage;
	}

	public static function paginate($table, $options, $condition, $pageNumber, $extraOffset = 0) {
        try {
            $result = Query::read(["*"], $table, $options, $condition, "", "date DESC", "", "");
            $totalCount = ($result["rowCount"] > 0) ? $result["rowCount"] : (int)0;
            $extraOffset = (int)$extraOffset > $totalCount ? 0 : (int)$extraOffset;
            return new Pagination((int)$pageNumber, $totalCount - $extraOffset);
        } catch (\Exception $error) {
            Logger::log("GETTING PAGINATION DATA ERROR", $error->getMessage(), __FILE__, __LINE__);
            return false;
        }
    }

	public function getOffset() {
        return ($this->currentPage - 1) * $this->itemsPerPage;
    }

    public function search($query) {
        $controller = new Controller;
        return $controller->get($query);
    }

    public function totalPages() {
        return ceil($this->totalCount/$this->itemsPerPage);
    }

    public function previousPage() {
        return $this->currentPage - 1;
    }

    public function nextPage() {
        return $this->currentPage + 1;
    }

    public function hasPreviousPage() {
        return $this->previousPage() >= 1 ? true : false;
    }

    public function hasNextPage() {
        return $this->totalPages() >= $this->nextPage() ? true : false;
    }

}
