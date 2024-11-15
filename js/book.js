$(document).ready(function () {
  setTimeout(function () {
    $(".auto-close").fadeOut("slow");
  }, 2000);

  $(".book").hide();
  $(".monograph").hide();
  $(".fasilnama").hide();
  $(".general-book").hide();
  $(".rule-book").hide();
  $(".history").hide();
  $(".cd").hide();
  $(".faculty-showing").hide();
  $(".department-showing").hide();
  $(".book-case-showing").hide();
  $(".row-showing").hide();
  $(".column-showing").hide();

  $(".section").change(function () {
    let sectionValue = $(".section").val();
    if (sectionValue == 01) {
      book();
    } else if (sectionValue == "0011") {
      fasilnama();
    } else if (sectionValue == "0012") {
      general();
    } else if (sectionValue == "0013") {
      rule();
    } else if (sectionValue == "14") {
      monograph();
    } else if (sectionValue == "0015") {
      history();
    } else if (sectionValue == "0016") {
      cd();
    }
  });

  //    Faculty Show ID
  $(".faculty").change(function () {
    let fac = $(".faculty").val();
    $("#faculty1-id-interface").val(fac);
    $("#faculty2-id-interface").val(fac);
    return showFac(fac);
  });
  function showFac(facul) {
    let newFacul = facul;
    $(".faculty-id-value").val(newFacul);
  }
  //    Department Show ID
  $(".department").change(function () {
    let dep = $(".department").val();
    $("#department1-id-interface").val(dep);
    $("#department2-id-interface").val(dep);
    return showDep(dep);
  });
  function showDep(depart) {
    let newDepart = depart;
    $(".department-id-value").val(newDepart);
  }
  //    Book Case Show ID
  $(".book-case").change(function () {
    let book_case = $(".book-case").val();
    $("#case1-id-interface").val(book_case);
    $("#case2-id-interface").val(book_case);
    $("#case3-id-interface").val(book_case);
    $("#case4-id-interface").val(book_case);
    $("#case5-id-interface").val(book_case);
    $("#case6-id-interface").val(book_case);
    $("#case7-id-interface").val(book_case);
    return showBookCase(book_case);
  });
  function showBookCase(bc) {
    let newBookCase = bc;
    $(".book-case-id-value").val(newBookCase);
  }
  //    Row ID Show
  $(".row-case").change(function () {
    let row = $(".row-case").val();
    $("#row1-id-interface").val(row);
    $("#row2-id-interface").val(row);
    $("#row3-id-interface").val(row);
    $("#row4-id-interface").val(row);
    $("#row5-id-interface").val(row);
    $("#row6-id-interface").val(row);
    $("#row7-id-interface").val(row);
    return showRow(row);
  });
  function showRow(caseRow) {
    let newRow = caseRow;
    $(".row-case-id-value").val(newRow);
  }
  //    Column ID Show
  $(".column").change(function () {
    let column = $(".column").val();
    $("#column1-id-interface").val(column);
    $("#column2-id-interface").val(column);
    $("#column3-id-interface").val(column);
    $("#column4-id-interface").val(column);
    $("#column5-id-interface").val(column);
    $("#column6-id-interface").val(column);
    $("#column7-id-interface").val(column);
    return showColumn(column);
  });
  function showColumn(caseColumn) {
    let newColumn = caseColumn;
    $(".column-case-id-value").val(newColumn);
    showAll();
  }

  //    Show All ID'es to Input ID
  function showAll() {
    let facValue = $(".faculty-id-value").val();
    let depValue = $(".department-id-value").val();
    let caseValue = $(".book-case-id-value").val();
    let rowValue = $(".row-case-id-value").val();
    let colValue = $(".column-case-id-value").val();
    let sectionID = $(".section").val();
    let fullId = facValue + depValue + caseValue + rowValue + colValue;
    $(".book_id").val(fullId);
    $("#book-id-interface").val(fullId);
    $("#monograph_id").val(fullId);
    $("#fasilnama_id").val(sectionID + fullId);
    $("#history_id").val(sectionID + fullId);
    $("#rule_id").val(sectionID + fullId);
    $("#general_id").val(sectionID + fullId);
    $("#cd_id").val(sectionID + fullId);
  }

  function book() {
    $(".book").show();
    $(".faculty-showing").show();
    $(".department-showing").show();
    $(".book-case-showing").show();
    $(".row-showing").show();
    $(".column-showing").show();
    $(".monograph").hide();
    $(".fasilnama").hide();
    $(".general-book").hide();
    $(".rule-book").hide();
    $(".history").hide();
    $(".cd").hide();
  }

  function monograph() {
    $(".monograph").show();
    $(".faculty-showing").show();
    $(".department-showing").show();
    $(".book-case-showing").show();
    $(".row-showing").show();
    $(".column-showing").show();
    $(".fasilnama").hide();
    $(".general-book").hide();
    $(".rule-book").hide();
    $(".history").hide();
    $(".cd").hide();
    $(".book").hide();
  }

  function fasilnama() {
    $(".fasilnama").show();
    $(".faculty-showing").hide();
    $(".department-showing").hide();
    $(".book-case-showing").show();
    $(".row-showing").show();
    $(".column-showing").show();
    $(".book").hide();
    $(".monograph").hide();
    $(".general-book").hide();
    $(".rule-book").hide();
    $(".history").hide();
    $(".cd").hide();
  }

  function history() {
    $(".history").show();
    $(".faculty-showing").hide();
    $(".department-showing").hide();
    $(".book-case-showing").show();
    $(".row-showing").show();
    $(".column-showing").show();
    $(".book").hide();
    $(".monograph").hide();
    $(".fasilnama").hide();
    $(".general-book").hide();
    $(".rule-book").hide();
    $(".cd").hide();
  }

  function rule() {
    $(".rule-book").show();
    $(".faculty-showing").hide();
    $(".department-showing").hide();
    $(".book-case-showing").show();
    $(".row-showing").show();
    $(".column-showing").show();
    $(".book").hide();
    $(".monograph").hide();
    $(".fasilnama").hide();
    $(".general-book").hide();
    $(".history").hide();
    $(".cd").hide();
  }

  function general() {
    $(".general-book").show();
    $(".faculty-showing").hide();
    $(".department-showing").hide();
    $(".book-case-showing").show();
    $(".row-showing").show();
    $(".column-showing").show();
    $(".book").hide();
    $(".monograph").hide();
    $(".fasilnama").hide();
    $(".rule-book").hide();
    $(".history").hide();
    $(".cd").hide();
  }

  function cd() {
    $(".cd").show();
    $(".faculty-showing").hide();
    $(".department-showing").hide();
    $(".book-case-showing").show();
    $(".row-showing").show();
    $(".column-showing").show();
    $(".book").hide();
    $(".monograph").hide();
    $(".fasilnama").hide();
    $(".general-book").hide();
    $(".rule-book").hide();
    $(".history").hide();
  }
});
