var sdk = new window.YocoSDK({
    publicKey: 'pk_test_657b29ffyL0dlr389b04'
});

// Create a new dropin form instance
var inline = sdk.inline({
    layout: 'field',
    amountInCents: 2499,
    currency: 'ZAR'
});
// this ID matches the id of the element we created earlier.
inline.mount('#card-frame');


var form = document.getElementById('payment-form');
var submitButton = document.getElementById('pay-button');
form.addEventListener('submit', function (event) {
    event.preventDefault()
    submitButton.disabled = true;

    inline.createToken().then(function (result) {
        submitButton.disabled = false;

        // console.log(result)
        // // send token to server
        fetch('http://127.0.0.1:8000/yoco', {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(result)
        })
            .then(res => res.json())
            .then(data => {
                console.log(data);
                if(data.error) alert("failed")

                if(data.status == "successful"){
                    alert("successful");
                }else{
                    alert("failed");
                }
            })


            .catch(err => console.warn(err))






        //     if (result.error) {
        //       const errorMessage = result.error.message;
        //       errorMessage && alert("error occured: " + errorMessage);
        //     } else {
        //       const token = result;
        //       alert("card successfully tokenised: " + token.id);
        //     }

    }).catch(function (error) {
        submitButton.disabled = false;
        console.warn(error)
        // alert("error occured: " + error);
    });

});