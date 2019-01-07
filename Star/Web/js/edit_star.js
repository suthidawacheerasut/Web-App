/* ----------------------------
    CustomValidation prototype
    - Keeps track of the list of invalidity messages for this input
    - Keeps track of what validity checks need to be performed for this input
    - Performs the validity checks and sends feedback to the front end
---------------------------- */

function CustomValidation(input) {
    this.invalidities = [];
    this.validityChecks = [];

    //add reference to the input node
    this.inputNode = input;

    //trigger method to attach the listener
    this.registerListener();
}

CustomValidation.prototype = {
    addInvalidity: function(message) {
        this.invalidities.push(message);
    },
    getInvalidities: function() {
        return this.invalidities.join('. \n');
    },
    checkValidity: function(input) {
        for ( var i = 0; i < this.validityChecks.length; i++ ) {

            var isInvalid = this.validityChecks[i].isInvalid(input);
            if (isInvalid) {
                this.addInvalidity(this.validityChecks[i].invalidityMessage);
            }

            var requirementElement = this.validityChecks[i].element;

            if (requirementElement) {
                if (isInvalid) {
                    requirementElement.classList.add('invalid');
                    requirementElement.classList.remove('valid');
                } else {
                    requirementElement.classList.remove('invalid');
                    requirementElement.classList.add('valid');
                }

            } // end if requirementElement
        } // end for
    },
    checkInput: function() { // checkInput now encapsulated

        this.inputNode.CustomValidation.invalidities = [];
        this.checkValidity(this.inputNode);

        if ( this.inputNode.CustomValidation.invalidities.length === 0 && this.inputNode.value !== '' ) {
            this.inputNode.setCustomValidity('');
        } else {
            var message = this.inputNode.CustomValidation.getInvalidities();
            this.inputNode.setCustomValidity(message);
        }
    },
    registerListener: function() { //register the listener here

        var CustomValidation = this;

        this.inputNode.addEventListener('keyup', function() {
            CustomValidation.checkInput();
        });


    }

};

/* ----------------------------
    Validity Checks
    The arrays of validity checks for each input
    Comprised of three things
        1. isInvalid() - the function to determine if the input fulfills a particular requirement
        2. invalidityMessage - the error message to display if the field is invalid
        3. element - The element that states the requirement
---------------------------- */

var M_phoneValidityChecks = [
    {
        isInvalid: function(input) {

            var illegalCharacters = input.value.match(/[^0-9]/g);
            return illegalCharacters ? true : false;
        },
        invalidityMessage: 'กรุณากรองเบอร์โทรศัพท์',
        element: document.querySelector('label[for="M_phone"] .input-requirements li:nth-child(1)')
    }
];

var M_ageValidityChecks = [
    {
        isInvalid: function(input) {
            return 100 < input.value || input.value <= 0;
        },
        invalidityMessage: 'กรุณากรองอายุอย่างน้อยมากกว่า 0 เเละไม่เกิน 100',
        element: document.querySelector('label[for="M_age"] .input-requirements li:nth-child(2)')
    },
    {
        isInvalid: function(input) {
            var illegalCharacters = input.value.match(/[^0-9]/g);
            return illegalCharacters ? true : false;
        },
        invalidityMessage: 'กรุณากรองอายุเป็นตัวเลข',
        element: document.querySelector('label[for="M_age"] .input-requirements li:nth-child(1)')
    }
];


var M_weightValidityChecks = [
    {
        isInvalid: function(input) {
            return 200 < input.value || input.value <= 2;
        },
        invalidityMessage: 'กรุณากรองนำ้หนักอย่างน้อยมากกว่า 2 เเละไม่เกิน 200',
        element: document.querySelector('label[for="M_weight"] .input-requirements li:nth-child(1)')
    },

    {
        isInvalid: function(input) {

            var illegalCharacters = input.value.match(/[^0-9]/g);
            return illegalCharacters ? true : false;
        },
        invalidityMessage: 'กรุณากรองน้ำหนักเป็นตัวเลข',
        element: document.querySelector('label[for="M_weight"] .input-requirements li:nth-child(2)')
    }
];

var M_heightValidityChecks = [
    {
        isInvalid: function(input) {
            return 250 < input.value || input.value <= 30;
        },
        invalidityMessage: 'กรุณากรองส่วนสูงอย่างน้อยมากกว่า 30 เเละไม่เกิน 250',
        element: document.querySelector('label[for="M_height"] .input-requirements li:nth-child(1)')
    },

    {
        isInvalid: function(input) {

            var illegalCharacters = input.value.match(/[^0-9]/g);
            return illegalCharacters ? true : false;
        },
        invalidityMessage: 'กรุณากรองส่วนสูงเป็นตัวเลข',
        element: document.querySelector('label[for="M_height"] .input-requirements li:nth-child(2)')
    }
];

var M_percentValidityChecks = [
    {
        isInvalid: function(input) {
            return 100 < input.value || input.value <= 0;
        },
        invalidityMessage: 'กรุณากรองเปอร์เซ็นค่าตัวดาราอย่างน้อยมากกว่า 0 เเต่ไม่เกิน 100',
        element: document.querySelector('label[for="M_percent"] .input-requirements li:nth-child(1)')
    },

    {
        isInvalid: function(input) {

            var illegalCharacters = input.value.match(/[^0-9]/g);
            return illegalCharacters ? true : false;
        },
        invalidityMessage: 'กรุณากรองเปอร์เซ็นค่าตัวดาราเป็นตัวเลข',
        element: document.querySelector('label[for="M_percent"] .input-requirements li:nth-child(2)')
    }
];

var M_firstnameValidityChecks = [
    {
        isInvalid: function(input) {
            return input.value.length < 2;
        },
        invalidityMessage: 'กรุณากรองความยาวอย่างน้อย 2 ตัวอักษร',
        element: document.querySelector('label[for="M_firstname"] .input-requirements li:nth-child(1)')

    },
    {
        isInvalid: function(input) {
            var illegalCharacters = input.value.match(/[u0E01-u0E5B]/g);
            var illegalCharacters2 = input.value.match(/[^a-zA-Z]/g);
            
            if(!(illegalCharacters) || !(illegalCharacters2)){
                return false;
            }
            else{
                return true;
            }
        },
        invalidityMessage: 'กรุณากรองตัวอักษรภาษาไทย',
        element: document.querySelector('label[for="M_firstname"] .input-requirements li:nth-child(2)')
    }

];  

var M_lastnameValidityChecks = [
    {
        isInvalid: function(input) {
            return input.value.length < 2;
        },
        invalidityMessage: 'กรุณากรองความยาวอย่างน้อย 2 ตัวอักษร',
        element: document.querySelector('label[for="M_lastname"] .input-requirements li:nth-child(1)')

    },
    {
        isInvalid: function(input) {
            var illegalCharacters = input.value.match(/[u0E01-u0E5B]/g);
            var illegalCharacters2 = input.value.match(/[^a-zA-Z]/g);
            
            if(!(illegalCharacters) || !(illegalCharacters2)){
                return false;
            }
            else{
                return true;
            }
            // return (illegalCharacters || illegalCharacters2) ? true : false;
        },
        invalidityMessage: 'กรุณากรองตัวอักษรภาษาไทยหรือภาษาอังกฤษ',
        element: document.querySelector('label[for="M_lastname"] .input-requirements li:nth-child(2)')
    }

];


/* ----------------------------
    Setup CustomValidation
    Setup the CustomValidation prototype for each input
    Also sets which array of validity checks to use for that input
---------------------------- */
var M_phoneInput = document.getElementById('M_phone');
var M_ageInput = document.getElementById('M_age');
var M_weightInput = document.getElementById('M_weight');
var M_heightInput = document.getElementById('M_height');
var M_percentInput = document.getElementById('M_percent');
var M_firstnameInput = document.getElementById('M_firstname');
var M_lastnameInput = document.getElementById('M_lastname');

M_firstnameInput.CustomValidation = new CustomValidation(M_firstnameInput);
M_firstnameInput.CustomValidation.validityChecks = M_firstnameValidityChecks;

M_heightInput.CustomValidation = new CustomValidation(M_heightInput);
M_heightInput.CustomValidation.validityChecks = M_heightValidityChecks;

M_weightInput.CustomValidation = new CustomValidation(M_weightInput);
M_weightInput.CustomValidation.validityChecks = M_weightValidityChecks;

M_ageInput.CustomValidation = new CustomValidation(M_ageInput);
M_ageInput.CustomValidation.validityChecks = M_ageValidityChecks;

M_phoneInput.CustomValidation = new CustomValidation(M_phoneInput);
M_phoneInput.CustomValidation.validityChecks = M_phoneValidityChecks;

M_percentInput.CustomValidation = new CustomValidation(M_percentInput);
M_percentInput.CustomValidation.validityChecks = M_percentValidityChecks;

M_lastnameInput.CustomValidation = new CustomValidation(M_lastnameInput);
M_lastnameInput.CustomValidation.validityChecks = M_lastnameValidityChecks;

/* ----------------------------
    Event Listeners
---------------------------- */

var inputs = document.querySelectorAll('input:not([type="submit"])');
var submit = document.querySelector('input[type="submit"');
var form = document.getElementById('registration');

function validate() {
    for (var i = 0; i < inputs.length; i++) {
        inputs[i].CustomValidation.checkInput();
    }
}

submit.addEventListener('click', validate);
form.addEventListener('submit', validate);