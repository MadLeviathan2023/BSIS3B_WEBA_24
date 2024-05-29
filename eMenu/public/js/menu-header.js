const FRM_SEARCH = document.getElementById('frmSearch');
const SEL_CATEGORY = document.getElementById('selCategory');

SEL_CATEGORY.onchange = () => {
    FRM_SEARCH.submit();
}