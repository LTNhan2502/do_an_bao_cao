export function formatCurrency(number) {
    const formatter = new Intl.NumberFormat();
    return formatter.format(number);
}
