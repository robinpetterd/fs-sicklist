
<div class="content $MenuTitle">        	
       <% if Menu(2) %>
	<% include SideBar %>
    <% end_if %>
        <% if Menu(2) %>
                <div class="withsidebar">
    	<% end_if %>
            <div id="MainContent">
     <div id="SickEntry">            
 
  <% control SickEntry %>     
  
  <h3>$Forenames $LastName</h3>
  <br/>
  
  <h4>Sources</h4>
  <div id="SourceImages">
  <% control Images %>
   
  <div id="sourceIcon"> 
    <a href="image/display?remotefile=http://localhost/sape/assets/images/PB051047.JPG"><img src="themes/theme-fs-sicklist/images/source-icon.jpg" /></a>
    <br /> 
    <div style="font-size:.8em;">$image</div> 
  </div>
           
  <% end_control %> 
  
  </div>

  <div id="Details">
  <h4>Details</h4>

    
  <dl class="clearfix">
          
<dt><strong>LineNumber</strong></dt><dd><span title="">$LineNumber</span></dd>
<dt><strong>Sick List Ident</strong></dt><dd><span title="">$SickListIdent</span></dd>
<dt><strong>Ship</strong></dt><dd><span title="">$Ship</span></dd>
<dt><strong>Voyage Number</strong></dt><dd><span title="">$VoyageNumber</span></dd>
<dt><strong>Voyage Ident</strong></dt><dd><span title="">$VoyageIdent</span></dd>
<dt><strong>Transport Gender</strong></dt><dd><span title="">$TransportGender</span></dd> 
<dt><strong>Period Of Departure</strong></dt><dd><span title="">$PeriodOfDeparture </span></dd>
<dt><strong>Date Sailed - Bateson</strong></dt><dd><span title="">$DateSailedBateson</span></dd>
<dt><strong>Length Voyage</strong></dt><dd><span title="">$LengthVoyage </span></dd> 
<dt><strong>Season Sailed</strong></dt><dd><span title="">$SeasonSailed</span></dd> 
<dt><strong>Date Entered OnSickList</strong></dt><dd><span title="">$DateEnteredOnSickList</span></dd>
<dt><strong>Days Lapse Since Sailing</strong></dt><dd><span title="">$DaysLapseSinceSailing </span></dd>
<dt><strong>Percentage Voyage Lapsed</strong></dt><dd><span title="">$PercentageVoyageLapsed</span></dd>
<dt><strong>Forenames</strong></dt><dd><span title="">$Forenames</span></dd>
<dt><strong>LastName</strong></dt><dd><span title="">$LastName</span></dd>
<dt><strong>Age</strong></dt><dd><span title="">$Age</span></dd>
<dt><strong>No/ On The List</strong></dt><dd><span title="">$NoOnTheList</span></dd>
<dt><strong>Case Notes</strong></dt><dd><span title="">$CaseNotes </span></dd>
<dt><strong>Quality</strong></dt><dd><span title="">$Quality  </span></dd> 
<dt><strong>Trade</strong></dt><dd><span title="">$Trade</span></dd>
<dt><strong>Disease or Wound</strong></dt><dd><span title="">$DiseaseOrWound</span></dd>
<dt><strong>Diagnostic Interpretation</strong></dt><dd><span title="">$DiagnosticInterpretation</span></dd>
<dt><strong>Disease Classification1</strong></dt><dd><span title="">$DiseaseClassification1</span></dd>
<dt><strong>Disease Classification2</strong></dt><dd><span title="">$DiseaseClassification2</span></dd> 
<dt><strong>Date Discharged</strong></dt><dd><span title="">$DateDischarged </span></dd>
<dt><strong>Days On SickList</strong></dt><dd><span title="">$DaysOnSickList</span></dd> 

<dt><strong>Days At Sea Till Death</strong></dt><dd><span title="">$DaysAtSeaTillDeath</span></dd>
<dt><strong>Days At Sea Till Death Percentage Voyage</strong></dt><dd><span title="">$DaysAtSeaTillDeathOercentageVoyage</span></dd> 
<dt><strong>How Disposed Of</strong></dt><dd><span title="">$HowDisposedOf </span></dd>
<dt><strong>Transcribers Remarks</strong></dt><dd><span title="">$TranscribersRemarks</span></dd>
<dt><strong>Journal Remarks</strong></dt><dd><span title="">$JournalRemarks </span></dd>
<dt><strong>Reference</strong></dt><dd><span title="">$Reference</span></dd>
<dt><strong>JPEGNo</strong></dt><dd><span title="">$JPEGNo </span></dd>
<dt><strong>Bateson Notes</strong></dt><dd><span title="">$BatesonNotes</span></dd>
      </dl>
         
        <% end_control %>    
        
  </div>
    </div>      
             
                    $Form
                    $PageComments
            </div>
            
            
            <% if Menu(2) %>
                </div>
            <% end_if %>
        
        </div>
        
