import React from 'react';
import { IOrder } from '../interfaces/order.interface';
interface InvoiceProps {
    order: IOrder;
}
declare const InvoiceComponent: React.FC<InvoiceProps>;
export default InvoiceComponent;
