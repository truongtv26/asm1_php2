<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script>
    $(document).ready(function(){
        $("#myModal").modal('show');
    });
</script>
</head>
<body>
<div id="myModal" class="modal fade" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Thông báo</h5>
                <button type="button" class="close" data-dismiss="modal">x</button>
            </div>
            <div class="modal-body">
                <p><?=$message ?? ''?></p>
            </div>
        </div>
    </div>
</div>

<script>
    const closeBtn = document.querySelector(".close")

    closeBtn.addEventListener('click', ()=> {
        const modal = document.querySelector("#myModal");
        modal.classList.remove('show');
        modal.style.display = 'none';
        document.querySelector(".modal-backdrop").classList.remove('modal-backdrop');
        document.querySelector("body").classList.remove('modal-open');
        document.querySelector("body").style.overflow = '';
        document.querySelector("body").style.padding = '';
    })
</script>