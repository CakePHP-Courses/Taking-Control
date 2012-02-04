<?php
App::uses('Sanitize', 'Utility');
$this->set('documentData', array(
    'xmlns:dc' => 'http://purl.org/dc/elements/1.1/'));

$this->set('channelData', array(
    'title' => __("Most Recent Photos"),
    'link' => $this->Html->url('/', true),
    'description' => __("Most recent photos."),
    'language' => 'en-us'
));

foreach ($photos as $photo) {
    $photoTime = strtotime($photo['Photo']['created']);

    $photoLink = array(
        'controller' => 'photos',
        'action' => 'view',
		$photo['Photo']['id']
    );

    // This is the part where we clean the body text for output as the description
    // of the rss item, this needs to have only text to make sure the feed validates
    $bodyText = preg_replace('=\(.*?\)=is', '', $photo['Photo']['description']);
    $bodyText = $this->Text->stripLinks($bodyText);
    $bodyText = Sanitize::stripAll($bodyText);
    $bodyText = $this->Text->truncate($bodyText, 400, array(
        'exact'  => true,
        'html'   => true,
    ));

    echo  $this->Rss->item(array(), array(
        'title' => $photo['Photo']['title'],
        'link' => $photoLink,
        'guid' => array('url' => $photoLink, 'isPermaLink' => 'true'),
        'description' => $bodyText,
        'pubDate' => $photo['Photo']['created']
    ));
}