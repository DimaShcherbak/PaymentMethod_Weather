define(
    [
        'uiComponent',
        'Magento_Checkout/js/model/payment/renderer-list'
    ],
    function (
        Component,
        rendererList
    ) {
        'use strict';
        rendererList.push(
            {
                type: 'freecredit',
                component: 'SDN_PMW/js/view/payment/method-renderer/freecredit-method'
            }
        );
        return Component.extend({});
    }
);