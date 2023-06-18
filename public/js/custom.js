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


var table = jQuery('.data-table').DataTable({
  scrollX: true,
  scrollY: true,
  paging: false,
});

jQuery(document).ready(function() {
  jQuery("#stockid").on('click',function() {
    jQuery('html, body').animate({
        scrollTop: jQuery("#stockiddiv").offset().top
    }, 2000);
  });

  jQuery("#salesid").on('click',function() {
    jQuery('html, body').animate({
        scrollTop: jQuery("#salesiddiv").offset().top
    }, 2000);
  });
      
      jQuery("#category").select2({
          theme: "classic",
          placeholder:"Filter Category"
      }); 
      jQuery("#mastersku").select2({
        theme: "classic",
        placeholder:"Filter Master Sku"
      }); 
      jQuery("#skus").select2({
        theme: "classic",
        placeholder:"Filter Skus"
      }); 
      jQuery("#suppliers").select2({
        theme: "classic",
        placeholder:"Filter Supplier"
      }); 
     jQuery("#category").on("change",function(){
        var id = jQuery(this).val();
        
        jQuery.ajax({
              method: "POST",
              url: "fetchDropdownData",
              data: {
                  id: id
              },
              success: function(response) 
              {
                 var result = jQuery.parseJSON(response);
                 jQuery("#mastersku").html(result[0]);
                 jQuery('.mastersku').trigger('change'); 
                 
                 jQuery("#skus").html(result[1]);
                 jQuery('.skus').trigger('change'); 
              }
        });
     })

        jQuery("#searchfilter").on('click',function(){
              
          var categoryArray =  jQuery("#category").val();
          var masterskuArray = jQuery("#mastersku").val();
          var skuArray = jQuery("#sku").val();
          var supplierArray = jQuery("#supplier").val();
          
          var newurl = '';
          if(categoryArray != null && categoryArray != '')
          {
              if(newurl != '')
              {
                  newurl += '&category='+categoryArray;
              }
              else
              {
                  newurl += '?category='+categoryArray;
              }   
          }

        
          if(masterskuArray != null && masterskuArray != '')
          {
              if(newurl != '')
              {
                  newurl += '&mastersku='+masterskuArray;
              }
              else
              {
                  newurl += '?mastersku='+masterskuArray;
              }   
          }

          if(skuArray != null && skuArray != '')
          {
              if(newurl != '')
              {
                  newurl += '&skus='+skuArray;
              }
              else
              {
                  newurl += '?skus='+skuArray;
              }   
          }

          if(supplierArray != null && supplierArray != '')
          {
              if(newurl != '')
              {
                  newurl += '&suppliers='+supplierArray;
              }
              else
              {
                  newurl += '?suppliers='+supplierArray;
              }   
          }

          
          if(newurl != '')
          {
              window.history.pushState({ path: newurl }, '', newurl);
          }
          else
          {
              var newurl = window.location.protocol + "//" + window.location.host + window.location.pathname;
              window.history.pushState({ path: newurl }, '', newurl); 
          }
        
        window.location.href = newurl;
    });
  })


