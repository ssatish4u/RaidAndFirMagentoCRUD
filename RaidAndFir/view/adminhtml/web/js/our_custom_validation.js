   require(
        [
            'Magento_Ui/js/lib/validation/validator',
            'jquery',
            'mage/translate'
    ], function(validator, $){

            validator.addRule(
                'custom-validation',
                function (value) {
                    //return true or false based on your logic

                    return true;

                }
                ,$.mage.__('Custom Validation message.') // msg show if return false
            );
});