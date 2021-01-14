const numberOfPic = document.querySelector('.number-of-pictures');
const uploading = document.querySelector('.uploading');
var uploading_children = uploading.children
numberOfPic.addEventListener('change', (e) => {
    let count = e.target.value;
    if (count < uploading_children.length) {
        console.log(uploading_children);
        for (var i = 0; i <= uploading_children.length - count; i++) {

            uploading.removeChild(uploading_children[uploading_children.length - 1]);
        }
    } else {

        for (var i = 0; i < count - uploading_children.length; i++) {

            let div = document.createElement('div');
            div.classList.add('input-group')
            let input_text = document.createElement('input');
            input_text.classList.add('input--style-1');
            input_text.classList.add('input-group');
            input_text.setAttribute('type', 'text');
            input_text.setAttribute('placeholder', 'Color');
            input_text.setAttribute('required', 'required');
            input_text.addEventListener('onchange', (e) => {
                this.setAttribute('name', e.target.value);
            });
            let input_file = document.createElement('input');
            input_file.classList.add('input--style-1');
            input_file.setAttribute('type', 'file');
            input_file.setAttribute('required', 'required');
            div.appendChild(input_text);
            div.appendChild(input_file);
            uploading.appendChild(div);
        }
    }

});

//** ajax */