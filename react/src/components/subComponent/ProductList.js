import React, { useEffect, useState } from 'react';
import { Link } from "react-router-dom";
import axios from "axios";

const ProductList = () => {
    const [product, setProduct] = useState([]);
    useEffect(() => {
        const getAllProduct = async () => {
            try {
                const product = await axios.get("http://127.0.0.1:8000/api/product");
                // console.log(categories.data);
                setProduct(product.data);
            } catch (error) {
                console.log(error);
            }
        }
        getAllProduct();
    }, [])
    return (
        <>

            <table className="table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th className="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    {
                        product.map((product, i) => {
                            return (

                                // <tr key={Math.random()}>
                                <tr key={product.id}>
                                    <th>{i + 1}</th>
                                    <td>{product.pname}</td>
                                    <td>{product.quantity}</td>
                                    <td>{product.price}</td>
                                    <td className="text-center">
                                        <Link to={`/view/${product.id}`}><i className="mx-4 my-auto text-success far fa-eye" /></Link>
                                        <Link to={`/edit/${product.id}`}><i className="mx-4 my-auto text-primary fas fa-user-edit" /></Link>
                                        <Link to={``}><i className="mx-4 my-auto text-danger fas fa-trash-alt" /></Link>
                                    </td>
                                </tr>
                            );
                        })
                    }

                               
                </tbody>
            </table>
        </>
    );
};

export default ProductList;
