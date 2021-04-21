<?php

$idSale =0;

foreach($this->model->getAllDetails() as $sale):

    if($idSale != $sale->sal_id):?>
        <div class="accordion accordion-flush" id="accordionFlushExample">
            <div class="accordion-item">
                <h2 class="accordion-header" id="flush-heading<?php echo $sale->sal_id?>">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse<?php echo $sale->sal_id?>" aria-expanded="false" aria-controls="flush-collapse<?php echo $sale->sal_id?>">
                    Accordion Item #<?php echo $sale->sal_id?>
                </button>
                </h2>
                <div id="flush-collapse<?php echo $sale->sal_id?>" class="accordion-collapse collapse" aria-labelledby="flush-heading<?php echo $sale->sal_id?>" data-bs-parent="#accordionFlushExample">
                <div class="accordion-body">
    <?php else:?>
                
                    Placeholder content for this accordion, which is intended to demonstrate the <code>.accordion-flush</code> class. This is the first item's accordion body.
               
                <?php if($idSale == Intval($sale->sal_id) + 1):?>
                    </div>
                        </div>
                        </div>
                        </div>
                    <?php endif;?>
    <?php endif;

        $idSale = $sale->sal_id;
        endforeach;?>



        