define([
    "jquery"
], function($){
        "use strict";
        return function(config, element) {
            var attributes = $(".data.table.additional-attributes").find(".col.label");
            console.log(attributes.length);
        }
    }
)
