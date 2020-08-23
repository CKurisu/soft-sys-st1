$(function (){
    $('.sea-vu').on('keyup',function(){$TblFilter('#usersTbl',this.value);});
    $('.sea-vl').on('keyup',function(){$TblFilter('#loanTbl',this.value);});
    $('.sea-inv').on('keyup',function(){$TblFilter('#intentoryTbl',this.value);});
    $('.sea-vgt').on('keyup',function(){$TblFilter('#grouptopicTbl',this.value);});
    $('.fil-na').on('keyup',function(){$TblFilter('.tbl-warehouse',this.value);});
    $('.fil-list-na').on('keyup',function(){$TblFilter('.warehouse-tbl',this.value);});
    $('.fil-ty').on('change',function(){if(this.value){$TblFilter('.tbl-warehouse',$('.fil-ty option:selected').text());}else{$TblFilter('.tbl-warehouse','');}});
    $('.fil-list-ty').on('change',function(){if(this.value){$TblFilter('.warehouse-tbl',$('.fil-list-ty option:selected').text());}else{$TblFilter('.warehouse-tbl','');}});
    $('#listdata_yui_i_867564').on('click',function (){location.replace(window.location.pathname+window.location.hash);});
});
$TblFilter=function (tbl, value){
    var rows = document.querySelectorAll(tbl + ' tbody tr');        
    for(var i = 0; i < rows.length; i++){
        var showRow = false;
        var row = rows[i];
        row.style.display = 'none';
        for(var x = 0; x < row.childElementCount; x++){
            if(row.children[x].textContent.toLowerCase().indexOf(value.toLowerCase().trim()) > -1){
                showRow = true;break;}}
        if(showRow){row.style.display = null;}}}