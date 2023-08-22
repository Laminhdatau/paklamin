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




-- HITUNG BERDASARKAN PRODI DAN DOSEN
SELECT bs.bagian_soal, COUNT(DISTINCT su.id_survei) AS jumlah_survei 
FROM t_answer_kuesioner ak 
LEFT JOIN t_survei su ON (su.id_survei = ak.id_survei)
JOIN t_detail_krs dk ON (dk.kd_detail_krs = su.kd_detail_krs)
LEFT JOIN t_krs k ON (dk.kd_krs = k.kd_krs)
LEFT JOIN t_paket_perkuliahan pp ON (dk.kd_paket_perkuliahan = pp.kd_paket_perkuliahan)
LEFT JOIN t_kurikulum tk ON (tk.id_kurikulum = pp.id_kurikulum)
LEFT JOIN t_prodi pr ON (pr.id_prodi = tk.id_prodi)
LEFT JOIN t_soal s ON (s.id_soal = ak.id_soal)
LEFT JOIN t_bagian_soal bs ON (bs.id_bagian_soal = s.id_bagian_soal)
JOIN t_dosen d ON (d.kd_dosen = "f404461b-f89e-11ea-96f2-38b1dbb04e31")
WHERE bs.bagian_soal IS NOT NULL
and pr.id_prodi="3"
GROUP BY bs.bagian_soal
ORDER BY jumlah_survei DESC
LIMIT 0, 25





-- LAST QUERY UNTUK DETAIL


SELECT m.kd_mata_kuliah
,m.nama_mata_kuliah
,dp.kd_dosen_pengampu
,pp.kd_paket_perkuliahan
,p.id_periode_perkuliahan
,p.status
,p.id_semester
,bs.id_bagian_soal,
COALESCE(ROUND( (gd.jumlahsoal /(sd.total_soal * tm.total_mhs) ) * 100, 0 ),0) AS persentase
FROM t_mata_kuliah m 
, t_dosen_pengampu dp
, t_paket_perkuliahan pp
, t_periode_perkuliahan p
, v_total_mhs_dosen md
, t_soal s
, t_bagian_soal bs 
, v_ttl_soal_dosen sd
, v_total_mhs_dosen tm
, v_grafik gd
where dp.kd_mata_kuliah=m.kd_mata_kuliah
and pp.kd_mata_kuliah=m.kd_mata_kuliah
and pp.kd_mata_kuliah=dp.kd_mata_kuliah
and p.id_periode_perkuliahan=dp.id_periode_perkuliahan
and md.kd_dosen=dp.kd_dosen
and p.status='1'
and md.kd_dosen=dp.kd_dosen
and s.id_bagian_soal=bs.id_bagian_soal
and sd.id_bagian_soal=bs.id_bagian_soal
and gd.id_bagian_soal=bs.id_bagian_soal
and gd.kd_dosen=dp.kd_dosen
and tm.kd_dosen=dp.kd_dosen
and gd.kd_dosen=tm.kd_dosen
group by m.kd_mata_kuliah,dp.kd_dosen,p.id_periode_perkuliahan,bs.id_bagian_soal,pp.kd_paket_perkuliahan,gd.jumlahsoal,dp.kd_dosen_pengampu
order by m.kd_mata_kuliah