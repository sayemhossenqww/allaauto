import React from 'react';
import { currency_format } from '../utils';
import { IOrder } from '../interfaces/order.interface';

interface InvoiceProps {
    order: IOrder;
}

const InvoiceComponent: React.FC<InvoiceProps> = ({ order }) => {
    return (
        <div style={{
            fontFamily: "Arial, sans-serif",
            padding: "10mm",
            width: "210mm",
            height: "148mm",
            display: "flex",
            flexDirection: "column",
            justifyContent: "space-between",
            border: "1px solid #000"
        }}>
            {/* Header Section */}
            <div style={{ display: "flex", justifyContent: "space-between", alignItems: "flex-start" }}>
                {/* Store Info (Left) */}
                <div>
                    <img src="/images/newlogo.jpeg" width="120" alt="logo" />
                    <p style={{ margin: "0", fontWeight: "bold" }}>{order.settings?.storeName || "ALAA AUTO PARTS"}</p>
                    <p style={{ margin: "0" }}>Address</p>
                    {/* <p style={{ margin: "0" }}>Processed By: {order.user.name}</p> */}
                </div>

                {/* Invoice Title (Center) */}
                <div style={{ textAlign: "center", flexGrow: 1 }}>
                    <h3 style={{ textTransform: "uppercase", margin: "0", fontSize: "22px", fontWeight: "bold" }}>Invoice</h3>
                    <p style={{ margin: "5px 0", fontSize: "14px" }}>No: {order.number}</p>
                    <div style={{ margin: "5px 0" }}>
                        <img src={`data:image/png;base64,${order.number}`} alt="Barcode" style={{ height: "35px" }} />
                    </div>
                    <p style={{ margin: "0", fontSize: "14px" }}>Currency: US</p>
                </div>

                {/* Customer Info (Right) */}
                {order.customer && (
                    <div style={{ textAlign: "right" }}>
                        <p style={{ margin: "0", fontWeight: "bold", fontSize: "14px" }}>Date: {order.date_view}</p>
                        <p style={{ margin: "0", fontWeight: "bold", fontSize: "14px" }}>Customer Information</p>
                        <p style={{ margin: "0" }}><strong>Name:</strong> {order.customer.name}</p>
                        {order.customer.email && <p style={{ margin: "0" }}><strong>Email:</strong> {order.customer.email}</p>}
                        {order.customer.mobile && <p style={{ margin: "0" }}><strong>Mobile:</strong> {order.customer.mobile}</p>}
                        {order.customer.city && <p style={{ margin: "0" }}><strong>City:</strong> {order.customer.city}</p>}
                    </div>
                )}
            </div>

            {/* Logos Centered */}
            <div style={{ display: "flex", justifyContent: "center", alignItems: "center", marginTop: "10px" }}>
                <img src="/images/bmw.png" width="70" height="70" alt="BMW" />
                <img src="/images/landRover.png" width="100" height="100" alt="Land Rover" />
                <img src="/images/mercedes.png" width="70" height="70" alt="Mercedes" />
            </div>

            {/* Invoice Table */}
            <table style={{ width: "100%", borderCollapse: "collapse", marginTop: "15px" }}>
                <thead>
                    <tr style={{ backgroundColor: "#000", color: "#fff", borderBottom: "1px solid #000" }}>
                        <th style={{ padding: "8px", textAlign: "center" }}>Code</th>
                        <th style={{ padding: "8px", textAlign: "center" }}>Description</th>
                        <th style={{ padding: "8px", textAlign: "center" }}>Qty</th>
                        <th style={{ padding: "8px", textAlign: "center" }}>Price</th>
                        <th style={{ padding: "8px", textAlign: "center" }}>Discount</th>
                        <th style={{ padding: "8px", textAlign: "center" }}>VAT</th>
                        <th style={{ padding: "8px", textAlign: "center" }}>Total</th>
                    </tr>
                </thead>
                <tbody>
                    {order.order_details.map((detail, index) => (
                        <tr key={index} style={{ textAlign: "center", borderBottom: "1px solid #000" }}>
                            <td>{detail.product.name}</td>
                            <td></td>
                            <td>{detail.quantity}</td>
                            <td>{currency_format(detail.view_price, 2, ".", ",", "before", "$")}</td>
                            <td></td>
                            <td></td>
                            <td>{currency_format(detail.view_total, 2, ".", ",", "before", "$")}</td>
                        </tr>
                    ))}
                </tbody>
            </table>

            {/* Summary Section */}
            <div style={{ display: "flex", justifyContent: "space-between", marginTop: "20px", fontSize: "14px" }}>
                <div style={{ fontWeight: "bold" }}>
                    <p>QTY: {order.order_details.reduce((sum, item) => sum + item.quantity, 0)}</p>
                </div>
                <div>
                    <table style={{ maxWidth: "250px", width: "100%" }}>
                        <tbody>
                            {order.discount !== undefined && order.discount > 0 && (
                                <tr><td>Discount:</td><td>{currency_format(order.discount_view || 0, 2, ".", ",", "before", "$")}</td></tr>
                            )}
                            <tr>
                                <td style={{ fontWeight: "bold" }}>TOTAL:</td>
                                <td style={{ fontWeight: "bold" }}>{currency_format(order.total_view || 0, 2, ".", ",", "before", "$")}</td>
                            </tr>
                            <tr>
                                <td>In Word:</td>
                                <td>{order.total?.toString() || 'Zero'}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            {/* Footer */}
            <div style={{ textAlign: "center", marginTop: "20px" }}>
                <p style={{ margin: "0" }}>{order.date_view}</p>
            </div>

            {/* Print Script */}
            <script>
                {`
                    document.addEventListener("DOMContentLoaded", function() {
                        window.print();
                    });
                `}
            </script>
        </div>
    );
};

export default InvoiceComponent;
