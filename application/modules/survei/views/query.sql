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

-- =====================================

SELECT DISTINCT t_table from t_tb;

-- =============================================
-- //menjumlahkan record
SELECT COUNT(*) as alias from t_table;


-- ====================================
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




-- MENAMPILKAN KRS BY NIM/MAHASISWA

SELECT * 
FROM t_detail_krs dk 
,t_paket_perkuliahan pp
,t_dosen_pengampu dp
WHERE pp.kd_paket_perkuliahan=dk.kd_paket_perkuliahan
AND dp.kd_mata_kuliah=pp.kd_mata_kuliah
AND dp.id_periode_perkuliahan in (SELECT id_periode_perkuliahan FROM t_periode_perkuliahan WHERE status ="1")
AND dk.kd_krs=(SELECT kd_krs FROM t_krs WHERE nim='20501049')




-- grafik

 SELECT dp.kd_dosen_pengampu,bs.bagian_soal,so.id_bagian_soal,sum(DISTINCT(j.bobot)) as jumlah
        FROM t_answer_kuesioner ak
            ,t_survei s
            ,t_detail_krs dk
            ,t_jawaban j
            ,t_paket_perkuliahan pp
            ,t_dosen_pengampu dp
            ,t_soal so
            ,t_bagian_soal bs
                where s.id_survei=ak.id_survei
                and so.id_soal=ak.id_soal
                and j.id_jawaban=ak.id_jawaban
                and dk.kd_detail_krs=s.kd_detail_krs
                and pp.kd_paket_perkuliahan=dk.kd_paket_perkuliahan
                and dp.kd_mata_kuliah=pp.kd_mata_kuliah
                and bs.id_bagian_soal=so.id_bagian_soal
                and s.id_jenis_survei=1
                and dp.id_kelas=2
            GROUP BY dp.kd_dosen_pengampu,so.id_bagian_soal
            ORDER by bs.bagian_soal