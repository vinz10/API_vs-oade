<?php
/**
 * Class axesController
 */
class axesController extends Controller {

    /**
     // @method getAxes()
     // @desc Method that get axes from the DB
     // @return Axes
     */
    public static function getAxes() {
        return Axe::getAxes();
    }
    
    /**
     // @method getAxeById()
     // @desc Method that get an axe by the id of the axe from the DB
     // @param int $idAxe
     // @return Axe
     */
    public static function getAxeById($idAxe) {
        return Axe::getAxeById($idAxe);
    }
}

