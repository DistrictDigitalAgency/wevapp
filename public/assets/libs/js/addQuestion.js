$(function () {
    var duplicates = 0,
        $original = $('.question-div').clone(true),
        $form = $('.hidden-div');

    function DuplicateForm () {
        var newForm;

        duplicates++;

        newForm = $original.clone(true).insertBefore($('.line-divider'));

        $.each($('input', newForm), function(i, item) {
            if ($(item).attr('name')=="questionContent0")
            {
                $(item).attr('name', "questionContent" + duplicates);
            }

            else if ($(item).attr('name')=="questionPrice0")
            {
                $(item).attr('name', "questionPrice" + duplicates);
                $(item).attr('id', "questionPrice" + duplicates);

            }
            else if ($(item).attr('name')=="answer10")
            {
                $(item).attr('name', "answer1" + duplicates);
                $(item).attr('id', "answer1" + duplicates);

            }

            else if ($(item).attr('name')=="answer20")
            {
                $(item).attr('name', "answer2" + duplicates);
                $(item).attr('id', "answer2" + duplicates);

            }
            else if ($(item).attr('name')=="answer30")
            {
                $(item).attr('name', "answer3" + duplicates);
                $(item).attr('id', "answer3" + duplicates);

            }
            else if ($(item).attr('name')=="answer40")
            {
                $(item).attr('name', "answer4" + duplicates);
                $(item).attr('id', "answer4" + duplicates);

            }



        });
        $.each($('span', newForm), function(i, item) {
            if ($(item).attr('name')=="questionReach0")
            {
                $(item).attr('name', "questionReach" + duplicates);
                $(item).attr('id', "questionReach" + duplicates);
            }
        });

        $('<h5>Question ' + (duplicates + 1) + '</h5>').insertBefore(newForm);
    }



    function updateNbQuestion() {
        $form.attr('value',duplicates+1);

    }

    $('a[href="add-new-form"]').on('click', function (e) {
        e.preventDefault();
        DuplicateForm();
        updateNbQuestion();
        if(duplicates==9)
        {document.getElementById("addQuestionButton").style.display = "none";}
    });
});