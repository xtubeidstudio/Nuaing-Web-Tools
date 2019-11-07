<?php

	require_once ("Search.php");

	class QuoraSearch extends Search {

		public $URL = 'http://api.scraperapi.com?api_key=78b6cf211fd2ffa1eb4beb1ec89d3559&url=http://id.quora.com/search?q=';

		public function __construct() {
			parent::__construct($this->URL);
		}

		public function process($query) {
			$dom = $this->search($query);
			$titles = $this->searchClass($dom, "question_link");
			$descriptions = $this->searchClass($dom, "row content");

			for($item = 0; $item < $titles->length && $item < $this->limit && $item < $descriptions->length; $item++) {
				$title = $titles->item($item);
				$desc = $descriptions->item($item);

				$content_list = $this->searchClass($dom, "truncated_q_text", "", $desc);

				$node = [];

		    	$url = $title->getAttribute("href");

		    	$node['url'] = "http://www.quora.com" . $url;
		    	$node['title'] = $title->textContent;
		    	$node['description'] = $content_list->length > 0 ? $content_list[0]->textContent: "";

		    	$this->results[] = $node;
			}
		}
	}
?>