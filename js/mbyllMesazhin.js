window.onload = () => {
    document.getElementById('mbyllMesazhin').onclick = function() {
        this.parentNode.remove()
        return false;
    };
};