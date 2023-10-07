<?php
// Read the JSON file
$jsonData = file_get_contents('offres.json');
$offers = json_decode($jsonData, true);

// Filter Active Offers
$activeOffers = array_filter($offers, function($offer) {
    return $offer['status'] === 'Active';
});

// Create a new folder for images
$newFolderName = 'active_offer_images';
if (!is_dir($newFolderName)) {
    mkdir($newFolderName);
}

// Copy images to the new folder and update offer information
$newOffers = array_map(function($offer) use ($newFolderName) {
    $sourceImagePath = "Images/{$offer['id']}.{$offer['extension']}";
    $destinationImagePath = "{$newFolderName}/{$offer['id']}.{$offer['extension']}";
    copy($sourceImagePath, $destinationImagePath);

    return [
        'status' => $offer['status'],
        'website' => $offer['website'],
        'location' => "/{$newFolderName}/{$offer['id']}.{$offer['extension']}"
    ];
}, $activeOffers);

// Save the new offer information to a new JSON file
$newJsonData = json_encode($newOffers, JSON_PRETTY_PRINT);
file_put_contents('active_offers.json', $newJsonData);

echo 'Process completed successfully.';
?>
