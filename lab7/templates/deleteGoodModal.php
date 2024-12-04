<div class="modal fade" id="deleteModal<?=sanitizeHTML($item['id'])?>" tabindex="-1" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="confirmDeleteModalLabel">Вы действительно хотите удалить запить?</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-outline-primary" data-bs-dismiss="modal">Нет</button>
                <form action="?delete_id=<?=sanitizeHTML($item['id'])?>" method="POST">
                    <button type="submit" class="btn btn-danger" name="delete_submit">Да</button>
                </form>

            </div>
        </div>
    </div>
</div>