    var count = 0;
    var totalPT = 0;
    var cilo;
    var co;
    var cilo_val;
    var co_val;
    function CILO_Select(name){
        cilo = name[name.selectedIndex].id;
        cilo_val = name[name.selectedIndex].value;
        //alert(cilo);
    }
    function AddQuestion(){

        count = count + 1;
        var QT = $('#QuestionType').val();
        var PT = $('#SetPoint').val();

        $("html, body").animate({ scrollTop: $(document).height() }, 1000);
        if(QT == ''){
            alert('Choose A Question Type');
        }
        else if(PT == 0){
            alert('Set a Score for the Question');
        }
        else if(cilo_val == 0 || cilo_val == undefined){
            alert('Choose an Intended Learning Outcome (CILO)');
        }
        else{

            totalPT = totalPT + parseInt(PT);
            $('#TotalPoints').html(totalPT);
            $('#QuestionCount').html(count);
            var content = '';
            content += '<tr>';
            content += '<td>';
            content += '<label>Question:</label><br><br>';
            content += '<textarea style="width:100%; height:100%;" name="AssessmentQuestion[]" required placeholder="Put Question Here..."></textarea>';
            content += '<br><br><label>CILO: </label>';
            content += ' <u>'+cilo+'</u> <br>';
            content += '<input type="hidden" name="'+count+'CILO[]" value="'+cilo_val+'">';
            content += '<input type="hidden" name="'+count+'QuestionPoint[]" value="'+PT+'">';
            content += '</td>';
            if(QT == 1){
                content += MultipleChoice();
                content += '<input type="hidden" name="'+count+'QuestionType[]" value="1">';
            }
            else if(QT == 2){
                content += TrueFalse();
                content += '<input type="hidden" name="'+count+'QuestionType[]" value="2">';
            }
            else if(QT == 3){
                content += Identification();
                content += '<input type="hidden" name="'+count+'QuestionType[]" value="3">';
            }
            else if(QT == 4){
                content += '<td><br><h4>Answers are to be checked manually.</h4></td>';
                content += '<input type="hidden" name="'+count+'QuestionType[]" value="4">';
            }

            content += '<td>';
            content += '<h4>Points: <u>'+PT+'</u></h4>';
            content += '<button class="btn btn-danger btn-block btn-lg" id="remove_'+count+'" name="removeobject" value="'+PT+'" onclick="RemoveQuestion(this.id)">';
            content += 'Remove';
            content += '</button>';
            content += '</td>';

            content += '</tr>';
        }
        $('#QuestionPanel').append(content);
        

    }
    function RemoveQuestion(test){
        //alert(parseInt($('#'+test).val()));
        totalPT = totalPT - parseInt($('#'+test).val());
        count = count - 1;
        $('#TotalPoints').html(totalPT);
        $('#QuestionCount').html(count);
        $('#'+test).parent().parent().remove();

    }
    function AssessmentSubmit(){
        var r = confirm("You cannot change the questions when submitted, are you sure you want to continue?");
        if (r == true) {
            $('#QuestionStructure').submit();
        } else {
        }
    }

    function MultipleChoice(){

        var content = '';
        content += '<td>';
        content += '<label>Choices (Tick the right Answer):</label>';
        content += '<div class="input-group">';
        content += '    <span class="input-group-addon">';
        content += '        <p>A</p>';
        content += '    </span>';
        content += '    <div class="form-line">';
        content += '        <input type="text"  class="form-control" name="'+count+'Mult_QuestionAnswer[A]" >';
        content += '    </div>';
        content += '    <span class="input-group-addon demo-radio-button">';
        content += '        <input class="with-gap radio-col-red" name="'+count+'MultChoice[]" type="radio" id="'+count+'radio1" value="A" />';
        content += '        <label for="'+count+'radio1"></label>';
        content += '    </span>';
        content += '</div>';

        content += '<div class="input-group">';
        content += '    <span class="input-group-addon">';
        content += '        <p>B</p>';
        content += '    </span>';
        content += '    <div class="form-line">';
        content += '        <input type="text" class="form-control" name="'+count+'Mult_QuestionAnswer[B]">';
        content += '    </div>';
        content += '    <span class="input-group-addon demo-radio-button">';
        content += '        <input class="with-gap radio-col-red" name="'+count+'MultChoice[]" type="radio" id="'+count+'radio2"  value="B"/>';
        content += '        <label for="'+count+'radio2"></label>';
        content += '    </span>';
        content += '</div>';

        content += '<div class="input-group">';
        content += '    <span class="input-group-addon demo-radio-button">';
        content += '        <p>C</p>';
        content += '    </span>';
        content += '    <div class="form-line">';
        content += '        <input type="text"  class="form-control" name="'+count+'Mult_QuestionAnswer[C]">';
        content += '    </div>';
        content += '    <span class="input-group-addon demo-radio-button">';
        content += '        <input class="with-gap radio-col-red" name="'+count+'MultChoice[]" type="radio" id="'+count+'radio3"  value="C" />';
        content += '        <label for="'+count+'radio3"></label>';
        content += '    </span>';
        content += '</div>';

        content += '<div class="input-group">';
        content += '    <span class="input-group-addon">';
        content += '        <p>D</p>';
        content += '    </span>';
        content += '    <div class="form-line">';
        content += '        <input type="text"  class="form-control" name="'+count+'Mult_QuestionAnswer[D]">';
        content += '    </div>';
        content += '    <span class="input-group-addon demo-radio-button">';
        content += '        <input class="with-gap radio-col-red" name="'+count+'MultChoice[]" type="radio" id="'+count+'radio4" value="D" />';
        content += '        <label for="'+count+'radio4"></label>';
        content += '    </span>';
        content += '</div>';
        content += '</td>';
        return content;

    }

    function TrueFalse(){

        var content = '';
        content += '<td>';
        content += '<label>Choices (Tick the right Answer):</label>';
        content += '<div class="input-group">';
        content += '    <div class="form-line">';
        content += '        <label>True</label>';
        content += '    </div>';
        content += '    <span class="input-group-addon demo-radio-button">';
        content += '        <input class="with-gap radio-col-red" name="'+count+'QuestionAnswer[]" value="TRUE" type="radio" id="'+count+'_radio1"  />';
        content += '        <label for="'+count+'_radio1"></label>';
        content += '    </span>';
        content += '</div>';
        content += '<div class="input-group">';
        content += '    <div class="form-line">';
        content += '        <label>False</label>';
        content += '    </div>';
        content += '    <span class="input-group-addon demo-radio-button">';
        content += '        <input class="with-gap radio-col-red" name="'+count+'QuestionAnswer[]" value="FALSE" type="radio" id="'+count+'_radio2"  />';
        content += '        <label for="'+count+'_radio2"></label>';
        content += '    </span>';
        content += '</div>';
        content += '</td>';
        return content;

    }

    function Identification(){

        var content = '';
        content += '<td>';
        content += '<label>Answer:</label>';
        content += '<div class="input-group"><br>';
        content += '    <span class="input-group-addon">';
        content += '        <i class="material-icons">assignment_turned_in</i>';
        content += '    </span>';
        content += '    <div class="form-line">';
        content += '        <input type="text" class="form-control" placeholder="Answer here..." name="'+count+'QuestionAnswer[]">';
        content += '    </div>';
        content += '</div>';
        content += '</td>';
        return content;

    }
    
