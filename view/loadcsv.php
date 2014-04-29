<form class="uploadCSV">  
  <img id="loading" src="img/loading.gif" style="margin:0px auto 20px auto;display:none;"/>
  <div id="drop_zone">Drop CSV files here</div>
  <button type="submit" id="confirmButton" class="formbtn" style="display:none;margin: 0px auto 50px auto;">Add Equipments</button>
  <p id="warning" style="font-size:24px;display:none;text-align:center"><strong>Cannot upload equipments to server. Please fill all fields.</strong></p>
  <table id="inventory" class="inventory" style="display:none">      
    <tr>
      <th>Article</th>
      <th>Description</th>
      <th>Account Title</th>
      <th>Property No.</th>
      <th>Location</th>
      <th>Unit Measure</th>
      <th>Unit Value</th>
      <th>OHC quantity</th>
      <th>Point Person</th>
      <th>Department</th>
      <th>Remarks</th>
      <th>Date Acquired</th>
      <th>OHC_date</th>    
    </tr>   
  </table>
  <output id="list"></output>
</form>

<script>
  
  function handleFileSelect(evt) {
    evt.stopPropagation();
    evt.preventDefault();

    var files = evt.dataTransfer.files;
    var output = [];
    var counter = 1;
    for (var i = 0, f; f = files[i]; i++) {
      var reader = new FileReader();
      var sFileName = f.name;
      var sFileExtension = sFileName.split('.')[sFileName.split('.').length - 1].toLowerCase();
      var iFileSize = f.size;
      var iConvert = (f.size / 1048576).toFixed(2);

      if (!(sFileExtension === "csv" || iFileSize > 10485760)) { /// 10 mb
        txt = "File type : " + sFileExtension + "\n\n";
        txt += "Size: " + iConvert + " MB \n\n";
        txt += "Please make sure your file is in csv format and less than 10 MB.\n\n";
        alert(txt);
        return;
      }

      reader.onload = function(theFile) {  
        document.getElementById("drop_zone").style.display = "none";
        document.getElementById("inventory").style.display = "block";
        str = theFile.target.result;           
        var lines = str.split(/[\r\n|\n]+/);   
        var tag = "#headerid";
        var headers = ["article", "description", "account_title", "property_number", "location", "unit_measure", 
                      "unit_value", "OHC_quantity", "point_person", "department", "remarks", "date_acquired", "ohc_date"];

        for(i = 1; i < lines.length;i++) {     
          lines[i] = lines[i].split(/,/);

          var html = "<tr id='entry_"+counter+"'> \n";
          for(x =0;x< lines[i].length;x++) {
            if (lines[i].length == 13) {
              if (lines[i][x] == "") {
                html += "<td style='background-color:red'>NULL</td>\n";
                document.getElementById("warning").style.display = "block";
              } else {
                html += "<td id=\'"+headers[x]+"_"+counter+"\'>" + lines[i][x] + "</td>\n";
              }
            }
          }

          html += "</tr>";
          $(html)
            .hide()
            .appendTo(".inventory")
            .fadeIn(1000, function(){
              setTimeout("",300);
            });

          output.push(lines[i]);
          
          counter++;
        }

        if (!(document.getElementById("warning").style.display == "block")) {
          document.getElementById("confirmButton").style.display = "block";
        } else {
          document.getElementById("confirmButton").style.display = "none";
        }
      }
      
      reader.onerror = function() { console.log('Error reading file');}  
      reader.readAsText(f);
      output.push('<li><strong>', escape(f.name), '</strong> (', f.type || 'n/a', ') - ',
                  f.size, ' bytes, last modified: ',
                  f.lastModifiedDate ? f.lastModifiedDate.toLocaleDateString() : 'n/a',
                  '</li>');
    }   

    document.getElementById('list').innerHTML = '<ul>' + output.join('') + '</ul>';
  }

  function handleDragOver(evt) {
    evt.stopPropagation();
    evt.preventDefault();
    evt.dataTransfer.dropEffect = 'copy';
  }

  var dropZone = document.getElementById('drop_zone');
  dropZone.addEventListener('dragover', handleDragOver, false);
  dropZone.addEventListener('drop', handleFileSelect, false);
</script>

<script>
  $('#confirmButton').click(function(e) {
    setTimeout(function (){
      $('#confirmButton').hide();
      document.getElementById("loading").style.display = 'block';
    }, 0000);


    setTimeout(function (){
      var rows = parseInt($('#inventory tr').length);

      console.log(rows);
      for (var i = 1; i < rows; i++) {
        $.ajax({
          type: 'POST',
          url: "sql/addEquipment.php",
          data: {
                  article: $('#article_' + i).html(),            
                  description: $('#description_' + i).html(),
                  accountTitle: $('#account_title_' + i).html(),
                  property_number: $('#property_number_' + i).html(),
                  location: $('#location_' + i).html(),
                  unit_measure: $('#unit_measure_' + i).html(), 
                  unit_value: $('#unit_value_' + i).html(),
                  point_person: $('#point_person_' + i).html(),
                  department: $('#department_' + i).html(),
                  remarks: $('#remarks_' + i).html(),
                  quantity: $('#OHC_quantity_' + i).html(),
                  date_acquired: $('#date_acquired_' + i).html(),
                  ohc_date: $('#ohc_date_' + i).html()
                },
          async: false
        });
      }

      $('#theTitle').html("Inventory");
      $('.main').load("view/Inventory.php");      
      alert("Success!");
    }, 1000);
    
    return false;
  });  
</script>