<?php


function getOffres()
{
    return json_decode(file_get_contents(__DIR__ . '/offres.json'), true);
}

function getOffreById($id)
{
    $offres = getOffres();
    foreach ($offres as $offre) {
        if ($offre['id'] == $id) {
            return $offre;
        }
    }
    return null;
}

function createOffre($data)
{
    $offres = getOffres();

    $data['id'] = rand(1000000, 2000000);

    $offres[] = $data;

    putJson($offres);

    return $data;
}

function updateOffre($data, $id)
{
    $updateoffre = [];
    $offres = getOffres();
    foreach ($offres as $i => $offre) {
        if ($offre['id'] == $id) {
            $offres[$i] = $updateoffre = array_merge($offre, $data);
        }
    }

    putJson($offres);

    return $updateoffre;
}

function deleteOffre($id)
{
    $offres = getOffres();

    foreach ($offres as $i => $offre) {
        if ($offre['id'] == $id) {
            array_splice($offres, $i, 1);
        }
    }

    putJson($offres);
}

function uploadImage($file, $offre)
{
    if (isset($_FILES['picture']) && $_FILES['picture']['name']) {
        if (!is_dir(__DIR__ . "/images")) {
            mkdir(__DIR__ . "/images");
        }
        // Get the file extension from the filename
        $fileName = $file['name'];
        // Search for the dot in the filename
        $dotPosition = strpos($fileName, '.');
        // Take the substring from the dot position till the end of the string
        $extension = substr($fileName, $dotPosition + 1);

        move_uploaded_file($file['tmp_name'], __DIR__ . "/images/${offre['id']}.$extension");

        $offre['extension'] = $extension;
        updateOffre($offre, $offre['id']);
    }
}

function putJson($offres)
{
    file_put_contents(__DIR__ . '/offres.json', json_encode($offres, JSON_PRETTY_PRINT));
}

function validateoffre($offre, &$errors)
{
    $isValid = true;
    // Start of validation
    if (!$offre['sponsor']) {
        $isValid = false;
        $errors['sponsor'] = 'Sponsor is mandatory';
    }
    if (!$offre['offre']) {
        $isValid = false;
        $errors['offre'] = 'Offre is mandatory';
    }
    if (!$offre['category']) {
        $isValid = false;
        $errors['category'] = 'Category is mandatory';
    }
    if (!$offre['website']) {
        $isValid = false;
        $errors['website'] = 'Link redirect is mandatory';
    }

    // End Of validation

    return $isValid;
}
