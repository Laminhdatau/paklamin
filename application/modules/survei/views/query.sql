SELECT s.komentar,s.waktu,
        k.nama_kurikulum,k.tmt_kurikulum,k.tst_kurikulum,
        prd.nama_prodi, 
        sm.semester,sm.status, 
        p.kd_mata_kuliah,
        js.jenis_survei,
        mk.nama_mata_kuliah,
        b.nama_lengkap,
        bk.nama_lengkap as nama_dosen
                FROM t_survei s
                LEFT JOIN t_detail_krs d ON (d.kd_detail_krs = s.kd_detail_krs)
                LEFT JOIN t_paket_perkuliahan p ON (p.kd_paket_perkuliahan = d.kd_paket_perkuliahan)
                LEFT JOIN t_kurikulum k on (k.id_kurikulum=p.id_kurikulum)
                LEFT JOIN m_semester sm on (sm.id_semester=p.id_semester)
                LEFT JOIN t_jenis_survei js on (js.id_jenis_survei=s.id_jenis_survei)
                LEFT JOIN t_mata_kuliah mk on (mk.kd_mata_kuliah=p.kd_mata_kuliah)
                left join t_krs ks on (ks.kd_krs=d.kd_krs)
                left join t_mahasiswa mhs on (mhs.nim=ks.nim)
                left join t_biodata b on (b.nik=mhs.nik)
                left join t_prodi prd on (prd.id_prodi=k.id_prodi)
                left join t_jadwal_perkuliahan j on (prd.id_prodi=j.id_prodi)
                left join t_dosen_pengampu dp on (dp.kd_dosen_pengampu=j.kd_dosen_pengampu)
                left join t_dosen dos on (dos.kd_dosen=dp.kd_dosen)
                left join t_biodata_karyawan bk on (bk.nik=dos.nik)
                left join t_periode_perkuliahan pkul on (pkul.id_semester=sm.id_semester)
                where mhs.id_status_mahasiswa=1


SELECT DISTINCT t_table from t_tb;

SELECT COUNT(*) as alias from t_table;

SELECT 
l.target,
st.status_mahasiswa,
bk.nama_lengkap as nama_dosen,
mk.nama_mata_kuliah,mk.status as status_mk,
sm.semester,sm.status as status_semester 
from t_krs_up up 
left join t_mahasiswa m on (m.nim=up.nim)
left join t_krs_list l on (l.kd_krs=up.kd_krs)
left join t_dosen_pengampu dp on (l.kd_dosen_pengampu=dp.kd_dosen_pengampu)
left join t_dosen d on (d.kd_dosen=dp.kd_dosen)
left join t_biodata_karyawan bk on (bk.nik=d.nik)
left join t_mata_kuliah mk on (mk.kd_mata_kuliah=dp.kd_mata_kuliah)
left join t_paket_perkuliahan pk on (pk.kd_mata_kuliah=mk.nama_mata_kuliah)
left join m_semester sm on (sm.id_semester=pk.id_semester)
left join t_status_mahasiswa st on (st.id_status_mahasiswa=m.id_status_mahasiswa)
where st.id_status_mahasiswa=1 || sm.id_semester='2' || up.nim=20501049  order by l.target asc