$(function() {
    $( "#importForm" ).dialog({
      autoOpen: false,
      show: {
        effect: "blind",
        duration: 1000
      },
      hide: {
        effect: "explode",
        duration: 1000
      }
    });
 
    $( "#upload" ).click(function() {
      $( "#importForm" ).dialog( "open" );
    });
  });

