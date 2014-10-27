<!-- New address Section -->
    <section id="newAddress">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>New Address</h2>
                    <hr class="star-primary">
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2">
                    <!-- To configure the contact form email address, go to mail/contact_me.php and update the email address in the PHP file on line 19. -->
                    <!-- The form should work on most web servers, but if the form is not working you may need to configure your web server differently. -->
                    <form name="sentMessage" id="contactForm" novalidate>
                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label>Title</label>
                                <input type="text" class="form-control" placeholder="Title" id="title" required data-validation-required-message="Please enter the title.">
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label>Description</label>
                               <textarea rows="5" class="form-control" placeholder="Description" id="description" required data-validation-required-message="Please enter the description."></textarea>
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label>Address</label>
                                <input type="text" class="form-control" placeholder="Address" id="address" required data-validation-required-message="Please enter the new address.">
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label>Link</label>
                                <input type="text" class="form-control" placeholder="Link" id="link" required data-validation-required-message="Please enter the link ex: www.example.com">
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <br>
                        <div id="success"></div>
                        <div class="row">
                            <div class="form-group col-xs-12">
                                <button type="submit" class="btn btn-success btn-lg" onclick="Submit()">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
<script type="text/javascript">

function Submit(){

     var options = {
    	    type :"POST",
    	    data :{title:title, description:description , address:address, link:link }
     };

 

}


</script>