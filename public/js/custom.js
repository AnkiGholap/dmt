function getAge(fromdate, todate) {
  if (todate) todate = new Date(todate);
  else todate = new Date();

  var age = [],
    fromdate = new Date(fromdate),
    y = [todate.getFullYear(), fromdate.getFullYear()],
    ydiff = y[0] - y[1],
    m = [todate.getMonth(), fromdate.getMonth()],
    mdiff = m[0] - m[1],
    d = [todate.getDate(), fromdate.getDate()],
    ddiff = d[0] - d[1];

  if (mdiff < 0 || (mdiff === 0 && ddiff < 0)) --ydiff;
  if (mdiff < 0) mdiff += 12;
  if (ddiff < 0) {
    fromdate.setMonth(m[1] + 1, 0);
    ddiff = fromdate.getDate() - d[1] + d[0];
    --mdiff;
  }
  if (ydiff > 0) age.push(ydiff + " year" + (ydiff > 1 ? "s " : " "));
  if (mdiff > 0) age.push(mdiff + " month" + (mdiff > 1 ? "s" : ""));
  if (ddiff > 0) age.push(ddiff + " day" + (ddiff > 1 ? "s" : ""));
  if (age.length > 1) age.splice(age.length - 1, 0, " and ");
  return age.join("");
}


var table = jQuery('#data-table').DataTable({
  scrollX: true,
  scrollY: true,
  paging: false,
  'select': {
    'style': 'multi',
    'selector': 'td:first-child'
  }  
});


// jQuery('#dropdown').on('change', function (e) {
//   e.preventDefault();
//   var column1 = jQuery(this).children(':selected').attr('id');
//   console.log(column1);
//   // Get the column API object
//   var column = table.column(column1);
//   // Toggle the visibility
//   column.visible(!column.visible());
  
// });

$(document).ready(function() {


  var columnSelector = jQuery('#columnSelector').multiselect({
      includeSelectAllOption: true,
      onSelectAll: function() {
        jQuery.each([':eq(0)', ':eq(1)', ':eq(2)', ':eq(3)', ':eq(4)', ':eq(5)', ':eq(6)', ':eq(7)', ':eq(8)', ':eq(9)', ':eq(10)', ':eq(11)', ':eq(12)'], function(key, value) {
            table.column(value).visible(true);
          });
      },
      onDeselectAll: function() {
        jQuery.each([':eq(0)', ':eq(1)', ':eq(2)', ':eq(3)', ':eq(4)', ':eq(5)', ':eq(6)', ':eq(7)', ':eq(8)', ':eq(9)', ':eq(10)', ':eq(11)', ':eq(12)'], function(key, value) {
            table.column(value).visible(false);
          });
      },
      onChange: function(option, checked) {
        table.column(':eq(' + jQuery(option).val() + ')').visible(checked);
      },
  });
  columnSelector.multiselect('selectAll', false);
    
  // Refresh the multiselect to apply the 'selectAll' function
  columnSelector.multiselect('refresh');
});