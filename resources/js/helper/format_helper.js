export function formatPrice(no){
    return new Intl.NumberFormat("en-ID").format(no)
}