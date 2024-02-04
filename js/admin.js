const openModal = document.querySelector('.add-book-link')
        const modal = document.querySelector('.modal')
        const exit = document.querySelector('.exit-modal')

        openModal.addEventListener('click',function(e){
            e.preventDefault()
            modal.classList.remove('none')
            document.body.style.overflow = "hidden";
        })

        exit.addEventListener('click',function(e){
            e.preventDefault()
            modal.classList.add('none')
            document.body.style.overflow = "";
        })

        const modalUpdate = document.querySelector('.modal-update');
        const modalExitUpdate = document.querySelector('.exit-modal-update');
        const linkUpdate = document.querySelectorAll('.updateLink');

        linkUpdate.forEach((link) => {
        link.addEventListener('click', (e) => {
            e.preventDefault()
            modalUpdate.classList.remove('none');
        });
        });

        modalExitUpdate.addEventListener('click', () => {
        modalUpdate.classList.add('none');
        });


          