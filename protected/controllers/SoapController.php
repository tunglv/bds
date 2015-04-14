<?php

    class SoapController extends Controller
    {

        public function actions()
        {
            return array(
                'service'=>array(
                    'class'=>'CWebServiceAction',
                ),
            );
        }

        /**
        * @param string the symbol of the stock
        * @return string the stock price
        * @soap
        */
        public function getPrice($symbol)
        {
            return $symbol.' - abc';
        }


    }
