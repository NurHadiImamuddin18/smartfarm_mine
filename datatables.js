var $ = require( 'jquery' );
var DataTable = require( 'datatables.net' )(window, $);
 
let table = new DataTable('#myTable', {
    // config options...
});