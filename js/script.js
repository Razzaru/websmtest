document.querySelector('#submit-btn').addEventListener('click', function (evt) {
    
    evt.preventDefault();
    
    let fullName = document.querySelector('#fullName').value;
    let email = document.querySelector('#email').value;
    let leadText = document.querySelector('#leadText').value;

    if (fullName && email && leadText) {
        var dataArr = {
            fullName: fullName,
            email: email,
            leadText: leadText
        };

        fetch('ajax.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(dataArr)
        });
        if(dataArr.fullName.match(new RegExp('.{3,20}'))) {
            if(dataArr.email.match(new RegExp('\\w+@[a-zA-Z_]+?\\.[a-zA-Z]{2,6}'))) {
                if(dataArr.leadText.match(new RegExp('.{5,250}'))) {
                    var panel = constructPanel(dataArr);
                    var leads = document.querySelector('.leads');
                    leads.appendChild(panel);
                } else {
                    alert('Проверьте правильность ввода текста');
                }
            } else {
                alert('Проверьте правильность ввода email');
            }
        } else {
            alert('Проверьте правильность ввода имени');
        }
    } else {
        alert('Введите данные');
    }
});

function constructPanel(item) {
    var panel = document.createElement('div');
    panel.classList.add('panel');
    var header = document.createElement('div');
    header.classList.add('panel-header');
    var fullName = document.createElement('span');
    fullName.classList.add('plain-text');
    fullName.innerText = item.fullName;
    var email = document.createElement('span');
    email.classList.add('plain-text', 'pull-right');
    email.innerText = item.email;
    var body = document.createElement('div');
    body.classList.add('panel-body');
    var leadText = document.createElement('p');
    leadText.classList.add('lead-text');
    leadText.innerText = item.leadText;
    header.appendChild(fullName);
    header.appendChild(email);
    body.appendChild(leadText);
    panel.appendChild(header);
    panel.appendChild(body);

    return panel
}