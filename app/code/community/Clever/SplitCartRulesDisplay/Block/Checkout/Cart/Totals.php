<?php

class Clever_SplitCartRulesDisplay_Block_Checkout_Cart_Totals extends Mage_Checkout_Block_Cart_Totals {
    public function renderTotals($area = null, $colspan = 1) {
        $html = '';
        foreach($this->getTotals() as $total) {
            if ($total->getArea() != $area && $area != -1) {
                continue;
            }
            if ($total->getCode() == 'discount') {
                foreach ($total->getRules() as $data) {
                	$html .= $this->renderTotal($data, $area, $colspan);
                }
            } else {
            	$html .= $this->renderTotal($total, $area, $colspan);
            }
        }
        return $html;
    }
}