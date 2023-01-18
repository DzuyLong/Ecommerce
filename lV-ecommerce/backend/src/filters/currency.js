export default function currencyUSD(value) {
    return new Intl.NumberFormat('vi-VN', {style: 'currency', currency: 'VND', maximumFractionDigits: 9})
      .format(value);
  }