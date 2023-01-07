<?php

class ModelExtensionPaymentFactoring004 extends Model
{
    const MIN_TOTAL_PRICE = 6000;
    const MAX_TOTAL_PRICE = 200000;

    public function __construct($registry)
    {
        parent::__construct($registry);
    }

    public function getMethod($address, $total)
    {
        $this->load->language('extension/payment/factoring004');
        $price = ceil($total);

        if ($price < self::MIN_TOTAL_PRICE || $price > self::MAX_TOTAL_PRICE) {
            return [];
        }

        return array(
            'code'       => 'factoring004',
            'title'      => '<img width="120px" src="/catalog/view/theme/default/image/factoring004.png" alt="logo"></br>'.$this->language->get('text_factoring004_condition'),
            'terms'      => '',
            'sort_order' => 0
        );
    }
}
