<?php

echo '
<div class="row">
    <div class="mx-auto">
                                                
        <!-- Main Carousel -->
        <div id="carousel' . $count . '" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">';

if (count($result2) > 0) {  // Use PDO method to check rows

    $isActive = true; // For setting the first item as active
    foreach ($result2 as $row2) {

        $pi_imagem = $row2["image"];

        echo '
            <div class="carousel-item ' . ($isActive ? 'active' : '') . '">
                <img src="http://localhost/ConcertPulse/public/users/' . $id . '/' . $pi_imagem . '" class="d-block rounded" class="d-block rounded"
                style="margin-left: 2.5%; width:95%; height: 25em;" alt="...">
            </div>';

        $isActive = false; // Set to false after the first item
    }
}

echo '
        </div>
        
        <button class="carousel-control-prev" type="button" data-bs-target="#carousel' . $count . '" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        
        <button class="carousel-control-next" type="button" data-bs-target="#carousel' . $count . '" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <div class="text-justify mt-4" style="width: 95%; margin-left: 2.5%;">
        <h1 class="title">' . $p_nome . '</h1>
        <p>' . $texto_formatado2 . '</p>
        <div class="mt-4 d-inline-flex align-items-center text-dark">
            <i class="mb-0 ni ni-send me-2"></i>
                <dt class="mb-0 me-2">País: </dt>
                <p class="mb-0 me-2">' . $p_local . '</p>
        </div>
        
        <br>
                                                
        <div class="mt-2 mb-4 d-inline-flex align-items-center text-dark">
            <i class="mb-0 ni ni-watch-time me-2"></i>
            <dt class="mb-0 me-2"> Data: </dt>
            <p class="mb-0 me-2">' . $p_data . '</p>
        </div>
    </div>
</div>

<div class="modal-footer">
    <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</button>
</div>
</div>';
