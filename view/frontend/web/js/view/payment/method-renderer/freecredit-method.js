define(
    ['jquery',
        'underscore',
        'ko',
        'Magento_Checkout/js/view/payment/default',
        'Magento_Checkout/js/model/quote',
        'Magento_Checkout/js/model/url-builder'
    ],
    function ($,
              _,
              ko,
              Component,
              quote,
              urlBuilder
    ) {
        'use strict';
        return Component.extend({
            defaults: {
                template: 'SDN_PMW/payment/freecredit',
            },
            city: ko.observable(null),
            temp: ko.observable(null),
            weatherVisible: ko.observable(false),

            getMailingAddress: function () {
                return window.checkoutConfig.payment.checkmo.mailingAddress;
            },
            getInstructions: function () {
                return window.checkoutConfig.payment.instructions[this.item.method];
            },

            increase: function () {
                var self = this;
                $.ajax({
                    type: "POST",
                    url: '/transfer/index/index',
                    data: {
                        'city': quote.shippingAddress().city
                    },
                    success: function (data) {
                        // console.log('success ajax success')
                        // console.log(data)
                        var obj = jQuery.parseJSON(data)
                        self.city(obj.name);
                        self.temp(obj.main.temp);
                        self.weatherVisible(true);
                    },
                    error: function (data) { // Данные не отправлены
                        console.log('error error error')
                    }
                });
            },
        });
    }
);
