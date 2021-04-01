$(document).ready(function(){
    var maxField = 10; //Input fields increment limitation
    var addButton = $('.add_button2'); //Add button selector
    var wrapper = $('.field_wrapper'); //Input field wrapper
    var fieldHTML = '<div class="borderrow"><div class="col-lg-2 col-md-2 col-sm-12 col-xs-12"><div class="createadmininputs"><div class="form-group"><label for="usr">Tank Name</label><input type="text" class="form-control" id="usr"></div></div></div><div class="col-lg-2 col-md-2 col-sm-12 col-xs-12"><div class="createadmininputs"><div class="form-group"><label for="usr">Total Capacity</label><input type="text" class="form-control" id="usr"></div></div></div><div class="col-lg-2 col-md-2 col-sm-12 col-xs-12"><div class="createadmininputs"><div class="form-group"><label for="usr">Opening Stock</label><input type="text" class="form-control" id=""></div></div></div><div class="col-lg-2 col-md-2 col-sm-12 col-xs-12"><div class="createadmininputs"><div class="form-group"><label for="usr">Unit Of Measurement</label><input type="text" class="form-control" id=""></div></div></div><div class="col-lg-2 col-md-2 col-sm-12 col-xs-12"><div class="createadmininputs"><div class="form-group"><label for="usr">Opening Balance</label><input type="text" class="form-control" id=""></div></div></div><div class="col-lg-2 col-md-2 col-sm-12 col-xs-12"><div class="createadmininputs"><div class="form-group"><label for="usr">Opening Dip</label><input type="text" class="form-control" id=""></div></div></div><a href="javascript:void(0);" class="remove_button plusbtn"><span class="glyphicon glyphicon-minus marginsets"></span></a></div>'; //New input field html 
    var x = 1; //Initial field counter is 1
    
    //Once add button is clicked
    $(addButton).click(function(){
        //Check maximum number of input fields
        if(x < maxField){ 
            x++; //Increment field counter
            $(wrapper).append(fieldHTML); //Add field html
        }
    });
    
    //Once remove button is clicked
    $(wrapper).on('click', '.remove_button', function(e){
        e.preventDefault();
        $(this).parent('div').remove(); //Remove field html
        x--; //Decrement field counter
    });
});