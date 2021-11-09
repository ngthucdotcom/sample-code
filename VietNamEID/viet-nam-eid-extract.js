const handler = (data = {}) => {
    let result = {};
    const currentYear = new Date().getFullYear();

    const buildResult = (value = {}) => {
        return {...result, ...value};
    }

    data.split(/\|/g).map(item => {
        // length of item less or equal than 12 and is number (parse to int and great than 0)
        if (item.length <= 12 && parseInt(item) > 0) {
            if (item.length === 12) { // new VN-ID (as 'CCCD' or 'CMND 12 numbers') have 12 numbers
                result = buildResult({id: item});
            }

            if (item.length === 9) { // old VN-ID (as 'CMND 9 numbers') have 9 numbers, not require because citizen maybe there was new VN-ID with barcode form factor before
                result = buildResult({oid: item});
            }

            if (item.length === 8) { // DoB and issueDate have 8 numbers, format DDMMYYYY
                const day = item.substring(0, 2);
                const month = item.substring(2, 4);
                const year = parseInt(item.substring(4, 8));
                const fullDate = `${day}-${month}-${year}`;
                const dateObj = !result.dob ? {dob: fullDate} : {issueDate: fullDate}; // dob always before issueDate
                result = buildResult(dateObj);
            }
            return item;
        }

        if (item === 'Nam' || item === 'Nữ') {
            result = buildResult({gender: item});
        }

        if (!result.fullName) { // fullName always before address or sometimes address not available
            result = buildResult({fullName: item});
        }

        if (!result.address && item.length > result.fullName.length) {
            result = buildResult({address: item});
        }

        return item;
    });
    return result;
}

// usage
const eid = '079090001001|020123456|Nguyễn Văn A|01011990|Nam|1 Lê Duẫn, Bến Nghé, Quận 1, Thành phố Hồ Chí Minh|01012021';
handle(eid);

// result
{
    "id": "079090001001",
    "oid": "020123456",
    "fullName": "Nguyễn Văn A",
    "dob": "01-01-1990",
    "gender": "Nam",
    "address": "1 Lê Duẫn, Bến Nghé, Quận 1, Thành phố Hồ Chí Minh",
    "issueDate": "01-01-2021"
}
