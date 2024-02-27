function verify(user_id) {
    document.getElementById(`${user_id}`).value=2;
    document.getElementById(`my-form-${user_id}`).submit();
}

function reject(user_id) {
    document.getElementById(`${user_id}`).value=3;
    document.getElementById(`my-form-${user_id}`).submit();
}
