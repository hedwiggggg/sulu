define(function(){"use strict";return{hasPermission:function(a,b){return a.hasOwnProperty("_permissions")?!(!a._permissions.hasOwnProperty(b)||!a._permissions[b]):!0}}});