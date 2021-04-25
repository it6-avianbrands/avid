<template>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="card-header"><h1>Master Barang</h1></div>
                    <div class="card-body">
                        <!--Modal Help-->
                        <!--<HelpModal></HelpModal>-->
                        <!--Hadiah-->
                        <form-check id="is_hadiah" name="IsHadiah"></form-check>
                        <!--Barang Cabang-->
                        <form-check id="is_barang_cabang" name="IsBarangCabang"></form-check>
                        <div class="form-group row">
                            <!--Kode-->
                            <form-regular id="kode_barang" type="text" name="KodeBarang" label="Kode" required="required"></form-regular>
                            <!--Produk-->
                            <form-help id="kode_produk" name="KodeProduk" label="Produk" required="required"></form-help>
                        </div>
                        <div class="form-group row">
                            <!--Nama-->
                            <form-regular id="nama_barang" type="text" name="NamaBarang" label="Nama"></form-regular>
                        </div>
                        <div class="form-group row">
                            <!--Keterangan-->
                            <form-regular id="keterangan" type="text" name="Keterangan" label="Keterangan"></form-regular>
                        </div>
                        <div class="form-group row">                   
                            <!--Warna-->
                            <form-help id="kode_warna" name="KodeWarna" label="Warna" required="required"></form-help>
                            <!--Barcode-->
                            <form-regular id="barcode" type="text" name="Barcode" label="Barcode"></form-regular>
                        </div>
                        <div class="form-group row"> 
                            <!--Merk-->
                            <form-help id="kode_merk" name="KodeMerk" label="Merk" required="required"></form-help>
                            <!--Jenis-->
                            <form-help id="kode_jenis" name="KodeJenis" label="Jenis" required="required"></form-help>
                        </div>
                        <div class="form-group row">
                            <!--Ukuran-->
                            <form-help id="kode_ukuran" name="KodeUkuran" label="Ukuran" required="required"></form-help>
                            <!--Model Satuan-->
                            <form-help id="kode_model_satuan" name="KodeModelSatuan" label="Kemasan" required="required"></form-help>
                        </div>
                        <div class="form-group row">                   
                            <!--Kode Satuan-->
                            <form-help id="kode_satuan" name="KodeSatuan" label="Satuan" required="required"></form-help>
                            <!--Qty Satuan-->
                            <form-regular id="qty_satuan" type="number" name="QtySatuan" label="Quantity"></form-regular>
                            <!--Berat Satuan-->
                            <form-regular id="berat_satuan" type="number" name="BeratSatuan" label="Berat"></form-regular>
                            <!--Qty Coli-->
                            <form-regular id="qty_coli" type="number" name="QtyColi" label="Qty Coli"></form-regular>
                        </div>
                        <div class="form-group row">                   
                            <!--Satuan Coli-->
                            <form-help id="satuan_coli" name="SatuanColi" label="Satuan Coli" required="required"></form-help>
                            <!--Disc Group Barang-->
                            <form-help id="disc_group_barang" name="DiscGroupBarang" label="Diskon Group" required="required"></form-help>
                            <!--Produk Group-->
                            <form-help id="produk_group" name="ProdukGroup" label="Produk Group" required="required"></form-help>
                        </div>
                        <div class="form-group row">
                            <form-regular id="group_1" type="text" name="Group1" label="Group 1" required="required"></form-regular>
                            <form-regular id="group_2" type="text" name="Group2" label="Group 2" required="required"></form-regular>
                            <form-regular id="group_3" type="text" name="Group3" label="Group 3" required="required"></form-regular>
                            <form-regular id="group_4" type="text" name="Group4" label="Group 4" required="required"></form-regular>
                            <form-regular id="group_A" type="text" name="GroupA" label="Group A" required="required"></form-regular>
                            <form-regular id="group_B" type="text" name="GroupB" label="Group B" required="required"></form-regular>
                            <form-regular id="group_C" type="text" name="GroupC" label="Group C" required="required"></form-regular>
                            <form-regular id="group_D" type="text" name="GroupD" label="Group D" required="required"></form-regular>
                            <form-regular id="group_DX" type="text" name="GroupDX" label="Group DX" required="required"></form-regular>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-sm btn-primary" type="submit"> Submit</button>
                        <button class="btn btn-sm btn-danger" type="reset"> Reset</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                
            }
        },
        methods: {
            
        }
    }
</script>